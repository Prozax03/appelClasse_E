<?php

    require_once ("settings.php");

    if($maintenance){
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    }
    $action = (isset($_GET['action']) && !empty($_GET['action']))?(strtolower($_GET['action'])):('home');

    require_once ("rooter.php");
    $dir = (array_key_exists($action, $rooter))?($rooter[$action]):("");

// *** traitement de l'action ***
    $scriptAction = 'controller/'.$dir.'a-' . $action . '.php';
    if (file_exists($scriptAction)) {
        include $scriptAction;


        // *** génération de la vue ***
        $scriptVue = 'view/'.$dir.'v-' . $state . '.php';
        include $scriptVue;


        // Ajout du footer si existant
        include 'view/footer.php';
    } else {
        header('Location: index.php?action=404');
    }
?>