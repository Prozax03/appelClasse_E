<?php 

	require_once "model/eleves.php";
	require_once 'model/sexes.php'; 
	require_once 'model/classes.php'; 

	$nom = strtoupper($_POST["nom"]);
	$prenom = ucfirst(strtolower($_POST["prenom"]));

	$sexe = new sexes();
	$sexe->retrieve($_POST["sexe"]);

	$classe = new classes();
	$classe->retrieve($_POST["classe"]);
	
	$dateEntree = $_POST["dateEntree"];
	$dateSortie = $_POST["dateSortie"];

	$dateNais = $_POST["dateNais"];

	$monObjet = new eleves(0, $nom, $prenom, $sexe, $classe, $dateEntree, $dateSortie, $dateNais);
	$monObjet->create();

	header('Location: index.php?action=alleleves');
?>