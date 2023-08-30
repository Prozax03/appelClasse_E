<?php

//DEBUT DU ROOTER
    $rooter = [
            // action => repertoire                             // Petite description

        //Home
            "home" => "home/",                               // Page d'accueil
            "about" => "home/",                                 // Page à propos

        //Appel
            "editappel" => "appel/",

        //Classes
            "addclasses" => "classes/",
            "editclasses" => "classes/",
            "delclasses" => "classes/",
            "allclasses" => "classes/",
            "formaddclasses" => "classes/",
            "formeditclasses" => "classes/",

        //Eleves
            "addeleves" => "eleves/",
            "editeleves" => "eleves/",
            "deleleves" => "eleves/",
            "alleleves" => "eleves/",
            "formaddeleves" => "eleves/",
            "formediteleves" => "eleves/",

        //VACANCES
            "allvacances" => "vacances/",
            "importvacances" => "vacances/",

        //Error
            "404" => "error/",                                       //Page Erreur 404

        //Settings
            "settings" => "settings/",
            "editzonevacance" => "settings/",
            "savimp" => "Import/",

        //FIN DU ROOTER
            "" => ""
    ];



    /* SYNTAXE DE NOMMAGE
     *
     * Si formulaire -> "form" + action + tableBDD (exemple : formaddtab)
     * Pour les actions sans vue utilisateur : action + tableBDD (exemple editkiosque)
     * Pour les pages de liste je met en general : "all" + tableBDD (exemple alladmin)
     *
     * */

