<?php
    require_once "view/header.php";
?>
	<br>
	<h1 class="center">Gestion des classes</h1>
	<br>
	<div style='text-align: center'><a href='index.php?action=formaddclasses' class="btn btn-classe">Ajouter une classe</a></div>
	<br>
	<div class="row g-3 justify-content-md-center">
        <div class="col-md-8">
			<table class="table table-bordered table-striped" id="myDatatable">
				<thead>
				<tr>
					<th>Libelle</th>
					<th>Libelle Court</th>
					<th>Ordre</th>
					<th></th>
				</tr>
				</thead>
			</table>
		</div>
	</div>