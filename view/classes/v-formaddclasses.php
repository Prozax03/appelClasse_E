<?php
    require_once "view/header.php";
?>
	<br>
	<h1 class="center">Gestion des classes</h1>
	<h5 class="center h5Cursive">Création</h5>
	<br>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-6 center">
				<img src="public/img/school.png" class="imgClasse">
			</div>
			<div class="col-md-6">
				<form action="index.php?action=addclasses" method="post">
					<br><br>
					<div class="form-floating mb-3">
						<input type="text" class="form-control" name="libelle" id="libelle" placeholder="ex : Cours Préparatoire" required>
						<label for="libelle">Libelle</label>
					</div>
					<br>
					<div class="form-floating mb-3">
						<input type="text" class="form-control" name="libelleCourt" id="libelleCourt" placeholder="ex : CP" required>
						<label for="libelleCourt">Libelle court</label>
					</div>
					<br>
					<div class="form-floating mb-3">
						<input type="number" class="form-control" name="ordre" id="ordre" placeholder="ex : 40" required>
						<label for="ordre">Ordre</label>
					</div>
					<br>
					<div class="center">
						<a href="javascript:history.go(-1)" class='btn btn-danger'>Retour</a>
						<input class='btn btn-classe' type='submit' value='Envoyer'>
					</div>
				</form>
			</div>
		</div>
	</div>

