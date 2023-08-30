<?php
    require_once "../../model/db.php";
    require_once "../../model/tools.php";

    $nom_dossier_parent = explode("/", $_SERVER["PHP_SELF"]);
    $nom_dossier_parent = $nom_dossier_parent[count($nom_dossier_parent) - 2]."/";

    $req = $db->prepare("SELECT e.id, e.nom, e.prenom, idSexe, dateNaissance, CONCAT(c.libelleCourt, ' - ', c.libelle) as 'classe', dateEntree, dateSortie FROM eleves e, sexes s, classes c WHERE e.idClasse = c.id AND e.idSexe = s.id AND DATE(NOW()) <= e.dateSortie ORDER BY c.ordre, e.nom, e.prenom;");
    $req->execute(array());

    $data = array();
    while($result = $req->fetch()) {
        $bouton = "<td><div style='text-align: center'>";
        $bouton .= "<a title='Modifier' href='index.php?action=formediteleves&id=".$result['id']."'><i class='fa-solid fa-edit colorEditEleve'></i></a>";
        $bouton .= "</div></td>";

        $sexe = ($result['idSexe'] == 1)?("<i class='fa-solid fa-mars' style='color: blue;'></i>"):("<i class='fa-solid fa-venus' style='color: pink;'></i>");

        $anniv = (date('m-d') == substr($result['dateNaissance'], 5))?("<span style='margin-left: 10px;'><i class='fa-solid fa-cake-candles'></i></span>"):("");

        $data[] = array(
            "ID" => $result['id'],
            "NOMPRENOM" => $result['nom'].' '.$result['prenom'],
            "DATENAIS" => tools::dateToHTML($result['dateNaissance']).$anniv,
            "SEXE" => $sexe,
            "CLASSE" => $result['classe'],
            "DATEENTREE" => tools::dateToHTML($result['dateEntree']),
            "DATESORTIE" => tools::dateToHTML($result['dateSortie']),
            "BUTTON" => $bouton
        );
    }
    //var_dump($data);
    $results = array(
        "sEcho" => 1,
        "iTotalRecords" => count($data),
        "iTotalDisplayRecords" => count($data),
        "aaData"=>$data);
    echo json_encode($results);
?>