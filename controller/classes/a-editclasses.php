<?php 

	require_once "model/classes.php";

	$id = $_POST["id"];
	$libelle = $_POST["libelle"];
	$libelleCourt = $_POST["libelleCourt"];
	$ordre = $_POST["ordre"];

	$monObjet = new classes($id, $libelle, $libelleCourt, $ordre);
	$monObjet->update();

	//var_dump($monObjet);
	header('Location: index.php?action=allclasses');
?>