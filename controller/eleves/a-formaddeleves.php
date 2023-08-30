<?php 

	require_once 'model/sexes.php'; 

	$mesSexes = array();
	$sexe = new sexes();
	$mesSexes = $sexe->findAll();

	require_once 'model/classes.php'; 
	$mesClasses = array();
	$classe = new classes();
	$mesClasses = $classe->findAll();

	$state = "formaddeleves";
?>