<?php
    require_once "../../model/db.php";
    require_once "../../model/tools.php";

    $nom_dossier_parent = explode("/", $_SERVER["PHP_SELF"]);
    $nom_dossier_parent = $nom_dossier_parent[count($nom_dossier_parent) - 2]."/";

    $req = $db->prepare("SELECT * FROM vacances v, libelle l WHERE v.idLibelle = l.id ORDER BY dateDebut DESC;");
    $req->execute(array());

    $data = array();
    while($result = $req->fetch()) {
        $data[] = array(
            "DATEDEBUT" => tools::dateToHTML($result['dateDebut']),
            "DATEFIN" => tools::dateToHTML($result['dateFin']),
            "LIBELLE" => $result['libelle'],
            "ANNEE" => date("Y", strtotime($result['dateDebut']))
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