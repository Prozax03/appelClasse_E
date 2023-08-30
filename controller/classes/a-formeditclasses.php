<?php 

	require_once 'model/classes.php'; 

	$id = $_GET["id"];
	$monObjet = new classes();
	$monObjet->retrieve($id);

	$state = "formeditclasses";
?>