<?php 

	require_once "model/classes.php";

	$libelle = $_POST["libelle"];
	$libelleCourt = $_POST["libelleCourt"];
	$ordre = $_POST["ordre"];

	$monObjet = new classes(0, $libelle, $libelleCourt, $ordre);
	$monObjet->create();

	header('Location: index.php?action=allclasses')
?>