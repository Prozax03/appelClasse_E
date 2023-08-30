<?php
    require_once "model/appel.php";
    $monAppel = new appel();

    $dateAppel = $_POST['da'];

    require_once "model/periode.php";
    $maPeriode = new periode();
    $maPeriode->retrieve($_POST['periode']);

    if($_POST['periode'] == 1){
        $mesAppelsJour = $monAppel->getAppelJourAM($dateAppel);
    }elseif ($_POST['periode'] == 2){
        $mesAppelsJour = $monAppel->getAppelJourPM($dateAppel);
    } else {
        header('Location: index.php?da='.$dateAppel);
    }

    foreach ($mesAppelsJour as $appel){
        $estPresent = ($_POST['present_'.$appel->getEleve()->getId()] == 0)?(0):(1);
        $monNewAppel = new appel($dateAppel, $maPeriode, $appel->getEleve(), $estPresent, "");
        $monNewAppel->update();
    }
    header('Location: index.php?da='.$dateAppel);
?>