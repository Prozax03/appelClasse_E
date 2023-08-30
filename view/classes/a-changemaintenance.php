<?php

session_start();

if (isset($_SESSION) && !empty($_SESSION['dsiApp']['auth']) && ($_SESSION['dsiApp']['auth']['role'] == "dev" || $_SESSION['dsiApp']['auth']['role'] == "Super admin" || in_array($_SERVER['REMOTE_USER'], $devUser))) {

    $monfichier = fopen('controller/settings/maintenance/maintenance.txt', 'r+');
    fseek($monfichier, 0);

    if ($maintenance){
        fputs($monfichier, 0);
    } else {
        fputs($monfichier, 1);
    }

    fclose($monfichier);

    header("Location: index.php?action=accueil");
} else {
    header("Location: index.php?action=login");
}
?>