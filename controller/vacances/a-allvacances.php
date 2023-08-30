<?php 
	
	require 'model/db.php';

	$alertColor = ""; $message = "";
	
	if(isset($_GET['i']) && !empty($_GET['i'])){
		if($_GET['i'] == 1){
			$message = "Fichier importé";
			$alertColor = "success";
		}
		if($_GET['i'] == 2){
			$message = "Même version que le tableau actuel";
			$alertColor = "warning";
		}
	}

	//GET DERNIERE MAJ FICHIER
	$req = $db->prepare("SELECT libelle FROM settings, zonesvacances WHERE id = idZoneVacance");
	$req->execute();
	$result = $req->fetch();
	$ZoneActuelle = $result['libelle'];
	//GET DERNIERE MAJ FICHIER
	$req = $db->prepare("SELECT * FROM miseajour");
	$req->execute();
	$result = $req->fetch();
	$versionActuelle = (!empty($result['dt']))?($result['dt']):("Importer le fichier pour initier la base");

	$datatable = true;
	$state = "allvacances";
?>