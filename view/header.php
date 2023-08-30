<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appel Classe</title>

    <!-- Favicon & App Icon -->
    <link rel="icon" href="favicon.ico" />
    <link rel="apple-touch-icon" sizes="57x57" href="public/img/apple-touch-icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="public/img/apple-touch-icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="public/img/apple-touch-icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="public/img/apple-touch-icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="public/img/apple-touch-icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="public/img/apple-touch-icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="public/img/apple-touch-icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="public/img/apple-touch-icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="public/img/apple-touch-icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="public/img/apple-touch-icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="public/img/apple-touch-icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="public/img/apple-touch-icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="public/img/apple-touch-icon/favicon-16x16.png">
    <link rel="manifest" href="public/img/apple-touch-icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="public/img/apple-touch-icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="addons/bootstrap/css/bootstrap.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="addons/GoogleFont/fonts.css">
    <!-- Font Awesome Icons -->
    <!--<link rel="stylesheet" href="addons/fontawesome-pro-6.4.0/css/pro.css">-->
    <link rel="stylesheet" href="addons/fontawesome-free-6.4.0/css/all.min.css">

    <!-- Datatables -->
    <link rel="stylesheet" href="addons/datatables/datatables.min.css" rel="stylesheet"/>

    <!-- Custom style -->
    <link rel="stylesheet" href="public/css/style.css">

    <?php
        if($state == "404"){
                echo "<!-- 404 style -->
                <link rel='stylesheet' href='public/css/404.css'>";
        }
    ?>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body>
    <?php require_once "menu.php"; ?>