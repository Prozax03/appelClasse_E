<?php
    require_once "view/header.php";
?>
	<br>
	<h1 class="center">Gestion des élèves</h1>
	<br>
	<div style='text-align: center'><a href='index.php?action=formaddeleves' class="btn btn-eleve">Ajouter un(e) élève</a></div>
	<br>
	<div class="row g-3 justify-content-md-center">
        <div class="col-md-8">
			<table class="table table-bordered table-striped" id="myDatatable">
				<thead>
				<tr>
					<th>NOM Prénom</th>
					<th>Date de naissance</th>
					<th>Sexe</th>
					<th>Classe</th>
					<th>Date d'entrée</th>
					<th>Date de sortie</th>
					<th></th>
				</tr>
				</thead>
			</table>
		</div>
	</div>