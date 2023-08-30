<?php
    require_once "view/header.php";
?>
	<br>
	<h1 class="center">Gestion des classes</h1>
	<h5 class="center h5Cursive">Edition</h5>
	<br>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-6 center">
				<img src="public/img/school.png" class="imgClasse">
			</div>
			<div class="col-md-6">
				<br><br>
				<form action="index.php?action=editclasses" method="post">
					<div class="form-floating mb-3">
						<input type="text" class="form-control" name="libelle" id="libelle" placeholder="ex : Cours Préparatoire" value="<?= $monObjet->getLibelle() ?>" required>
						<label for="libelle">Libelle</label>
					</div>
					<br>
					<div class="form-floating mb-3">
						<input type="text" class="form-control" name="libelleCourt" id="libelleCourt" placeholder="ex : CP" value="<?= $monObjet->getLibelleCourt() ?>" required>
						<label for="libelleCourt">Libelle court</label>
					</div>
					<br>
					<div class="form-floating mb-3">
						<input type="number" class="form-control" name="ordre" id="ordre" placeholder="ex : 40" value="<?= $monObjet->getOrdre() ?>" required>
						<label for="ordre">Ordre</label>
					</div>
					<br>
					<div class="center">
						<input type='text' name='id' value='<?= $monObjet->getId() ?>' hidden>
						<a href="javascript:history.go(-1)" class='btn btn-danger'>Retour</a>
						<input class='btn btn-classe' type='submit' value='Modifier'>
					</div>
				</form>
			</div>
		</div>
	</div>

