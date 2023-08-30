<?php
    $jourAnglais = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
    $jourFrancais = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
    $moisAnglais = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $moisFrancais = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");

    require_once "model/appel.php";

    if (isset($_REQUEST['da']) && !empty($_REQUEST['da'])){
        $dateJour = $_REQUEST['da'];
        $dateTimeJour = date_create($dateJour);
    } else {
        $dateJour = date('Y-m-d');
        $dateTimeJour = date_create($dateJour);
    }
    
    require "model/jourFerie.php";
    $annee = date_format($dateTimeJour, 'Y');
    $TabJourFerie = jours_feries($annee);

    $dateJourTexte = str_replace($jourAnglais, $jourFrancais, date_format($dateTimeJour, 'l d F Y'));
    $dateJourTexte = str_replace($moisAnglais, $moisFrancais, $dateJourTexte);

    $monAppel = new appel();
    require_once "model/eleves.php";
    $monEleve = new eleves();

    if (!$monAppel->getIsVacances($dateJour)){
        if (!in_array($dateJour, $TabJourFerie)){
            if (date_format($dateTimeJour, 'w') != 6 && date_format($dateTimeJour, 'w') != 0 && date_format($dateTimeJour, 'w') != 3){ //Si pas un samed, ni un dimanche
                if (!$monAppel->appelFait($dateJour)){
                    $mesEleves = $monEleve->findAllByJour($dateJour);

                    foreach ($mesEleves as $eleve){
                        $monAppel->creationListe($dateJour, $eleve);
                    }
                }

                $nbElevesByClasse = $monEleve->countEleveByClasseAndJour($dateJour);
                $nbElevesByClassePresentAM = $monAppel->countEleveByClasseAndJourPresent($dateJour, 1);
                $nbElevesByClassePresentAP = $monAppel->countEleveByClasseAndJourPresent($dateJour, 2);
                $mesAppelsJourAM = $monAppel->getAppelJourAM($dateJour);
                $mesAppelsJourPM = $monAppel->getAppelJourPM($dateJour);

                $state = "home";
            } else {
                $typeRepos = "Jour de repos";
                $state = "repos";
            }
        } else {
            $typeRepos = "Jour férié";
            $state = "repos";
        }
    } else {
        $typeRepos = "Vacance";
        $state = "repos";
    }

    

?>