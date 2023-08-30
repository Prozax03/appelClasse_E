<?php
    require_once "view/header.php";
?>
    <br>
	<h1 class="center">Paramètres</h1>
	<h5 class="center h5Cursive">Applications</h5>
	<br>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-6 center">
				<img src="public/img/settings.png" class="imgClasse">
			</div>
			<div class="col-md-6">
				<br><br>
				<div class="row">
					<div class="col-md-6">
						Numero de version : <I style="color: red;">v<?= $numVersion ?></I>
					</div>
					<div class="col-md-6">
						Version : <I style="color: red;"><?= $version ?></I>
					</div>
				</div>
				<br>
				<form action="index.php?action=editzonevacance" method="post">
					<div class="mb-3">
						<label for="zonevacance" class="form-label">Zone de vos vacances</label>
						<select class="form-select" id="zonevacance" name="zonevacance">
							<?php
								foreach ($lesZones as $value) {
									echo "<option value='".$value['id']."'"; echo ($idZoneVacance == $value['id'])?(" selected"):(""); echo ">".$value['libelle']."</option>";
								}
							?>
						</select>
					</div>
					<br>
					<div class="center">
						<input class='btn btn-classe' type='submit' value='Mettre à jour'>
					</div>
				</form>
			</div>
		</div>
	</div>
