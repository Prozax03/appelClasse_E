<?php

    require "model/db.php";

    $req = $db->prepare('SELECT * FROM settings;');
    $req->execute();
    $result = $req->fetch();

    $numVersion = $result['numVersion'];
    $version = $result['version'];
    $idZoneVacance = $result['idZoneVacance'];

    $req = $db->prepare('SELECT * FROM zonesvacances;');
    $req->execute();
    $lesZones = $req->fetchAll();

    $state = "settings";
?>