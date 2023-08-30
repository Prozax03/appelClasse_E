<?php
    require_once "view/header.php";
?>
	<br>
	<h1 class="center">Gestion des vacances scolaires - Zone <?= $ZoneActuelle ?></h1>
	<h7 class="center">Dernière version du fichier : <I style="color: red;"><?= $versionActuelle ?></I></h7>
	<br>
	<div style='text-align: center'><a href='index.php?action=importvacances' class="btn btn-vacance" title="Importer depuis le site de l'éducation"><i class="fa-solid fa-download fa-beat-fade"></i></a></div>
	<br>
	<div class="row g-3 justify-content-md-center">
        <div class="col-md-4">
		<?php 
			if($message != ""){
				echo "<div class='alert alert-".$alertColor." alert-dismissible myAlert' role='alert'>
						<div>".$message."</div>
						<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>";
			}
		?>
		</div>
	</div>
	<div class="row g-3 justify-content-md-center">
        <div class="col-md-8">
			<table class="table table-bordered table-striped" id="myDatatable">
				<thead>
				<tr>
					<th>Date de début</th>
					<th>Date de fin</th>
					<th>Vacance</th>
				</tr>
				</thead>
			</table>
		</div>
	</div>
