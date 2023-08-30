<?php

    //Maintenance
    $monfichier = fopen('controller/settings/maintenance/maintenance.txt', 'r+');
    $ligne = fgets($monfichier);
    fclose($monfichier);

    $maintenance = ($ligne == 1)?(true):(false);

    $devUser = [
        "prozax", "dev"                          //compte pour dev local
    ];

    

