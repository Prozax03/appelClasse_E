<?php 

    require "model/db.php";

	$zonevacance = $_POST["zonevacance"];
	
    $req = $db->prepare('UPDATE settings SET idZoneVacance = ?;');
    $req->execute(array($zonevacance));

	header('Location: index.php?action=importvacances&force=1');
?>