<?php 

	require_once 'model/eleves.php'; 
	require_once 'model/sexes.php'; 

	$mesSexes = array();
	$sexe = new sexes();
	$mesSexes = $sexe->findAll();

	require_once 'model/classes.php'; 
	$mesClasses = array();
	$classe = new classes();
	$mesClasses = $classe->findAll();

	$id = $_GET["id"];
	$monObjet = new eleves();
	$monObjet->retrieve($id);

	$state = "formediteleves";
?>