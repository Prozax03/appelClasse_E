<?php
    require_once "../../model/db.php";

    $nom_dossier_parent = explode("/", $_SERVER["PHP_SELF"]);
    $nom_dossier_parent = $nom_dossier_parent[count($nom_dossier_parent) - 2]."/";

    $req = $db->prepare("SELECT * FROM classes ORDER BY ordre");
    $req->execute(array());

    $data = array();
    while($result = $req->fetch()) {
        $bouton = "<td><div style='text-align: center'>";
        $bouton .= "<a title='Modifier' href='index.php?action=formeditclasses&id=".$result['id']."'><i class='fa-solid fa-edit colorEditClasse'></i></a>";
        $bouton .= "</div></td>";

        $data[] = array(
            "ID" => $result['id'],
            "LIBELLE" => $result['libelle'],
            "LIBELLECOURT" => $result['libelleCourt'],
            "ORDRE" => $result['ordre'],
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