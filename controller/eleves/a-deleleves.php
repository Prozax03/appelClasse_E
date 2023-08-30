<?php 

	require_once "model/eleves.php";

	$id = $_GET["id"];

	$monObjet = new eleves();
	$monObjet->delete($id);

	header('Location: index.php?action=alleleves');
?>