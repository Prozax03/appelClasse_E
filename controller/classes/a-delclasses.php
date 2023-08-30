<?php 

	require_once "model/classes.php";

	$id = $_GET["id"];

	$monObjet = new classes();
	$monObjet->delete($id);

	header('Location: index.php?action=allclasses');
?>