<?php 

	require_once 'model/classes.php'; 

	$mesClasses = array();
	$classe = new classes();
	$mesClasses = $classe->findAll();

	$datatable = true;
	$state = "allclasses";
?>