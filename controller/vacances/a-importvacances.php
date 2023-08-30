<?php 
    //http://telechargement.index-education.com/vacances.xml

    $url = 'http://telechargement.index-education.com/vacances.xml'; 
    
    // Initialiser la session cURL
    $session = curl_init($url); 
    // Inintialiser le nom de répertoire où le fichier sera sauvegardé
    $dir = './'; 
    $file_name = basename($url); 
    $save = $dir . $file_name; 
    // Ouvrir le fichier 
    $file = fopen($save, 'wb'); 
    // définit les option pour le transfert
    curl_setopt($session, CURLOPT_FILE, $file); 
    curl_setopt($session, CURLOPT_HEADER, 0); 
    curl_exec($session); 
    curl_close($session); 
    fclose($file); 


    require 'model/db.php';
    //require_once "../../model/jourferie.php";
    //$annee = date('Y');
    //$tabJourFeries = jours_feries($annee);

    $req = $db->prepare('SELECT * FROM miseajour');
    $req->execute();
    $result = $req->fetch();
    $nbLigne = $req->rowCount();
    
    if(isset($_GET['force']) && $_GET['force'] == 1){
        $versionActuelle = "1000/01/01";
    } else {
        $versionActuelle = (!empty($result['dt']))?($result['dt']):("1000/01/01");
    }

    $contenu = simplexml_load_file($file_name);

    $maj = str_replace('/', '-', $contenu['miseajour']);
    
    if($versionActuelle != $maj){
        if ($req->rowCount() == 0){
            $req = $db->prepare('INSERT INTO miseajour VALUES (?)');
        } else {
            $req = $db->prepare('UPDATE miseajour SET dt = ?');
        }
        $req->execute(array($maj));

        $req = $db->prepare('SET FOREIGN_KEY_CHECKS=0;TRUNCATE TABLE vacances; TRUNCATE TABLE libelle;SET FOREIGN_KEY_CHECKS=1;');
        $req->execute();

        $listeAcademies = $contenu->academies;
        $listeExceptionsZones = $contenu->exceptionszones;
        $listeLibelles = $contenu->libelles;
        $listeCalendrier = $contenu->calendrier;


        foreach ($listeLibelles->libelle as $libelle) {
            //var_dump($libelle);
            //echo "ID : ".$libelle['id']." - Libelle = ".$libelle." id =".$libelle['id']."<br>";
            $req = $db->prepare('INSERT INTO libelle VALUES (?, ?);');
            $req->execute(array($libelle['id'], $libelle));
        }

        $req = $db->prepare('SELECT libelle FROM zonesvacances, settings WHERE idZoneVacance = id;');
        $req->execute();
        $result = $req->fetch();
        $zoneVacance = $result['libelle'];

        foreach($listeCalendrier->zone as $zone){
            if($zone['libelle'][0] == $zoneVacance){
                foreach($zone->vacances as $vacance){
                    //var_dump($vacance);
                    $dateDebut = str_replace('/', '-', $vacance['debut']);
                    $dateFin = new DateTime(str_replace('/', '-', $vacance['fin']));
                    $dateFin->modify('-1 day');
                    //echo "Debut: ".$dateDebut." Fin: ".$dateFin." idLibelle : ".$vacance['libelle']."<br>";
                    $req = $db->prepare('INSERT INTO vacances VALUES (?, ?, ?);');
                    $req->execute(array($dateDebut, $dateFin->format('Y-m-d'), $vacance['libelle']));
                }
            }
        }
        header('Location: index.php?action=allvacances&i=1');
    } else {
        header('Location: index.php?action=allvacances&i=2');
    }
   
?>