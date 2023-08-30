<?php
    require_once "view/header.php";
?>
	<br>
	<h1 class="center">Gestion des élèves</h1>
	<h5 class="center h5Cursive">Création</h5>
	<br>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-6 center">
				<img src="public/img/fille.png" class="imgEleve">
			</div>
			<div class="col-md-6">
				<form action="index.php?action=addeleves" method="post">
					<div class="form-floating mb-3">
						<input type="text" class="form-control" name="nom" id="nom" placeholder="ex : POTTER" required>
						<label for="nom">NOM</label>
					</div>
					<div class="form-floating mb-3">
						<input type="text" class="form-control" name="prenom" id="prenom" placeholder="ex : Harry" required>
						<label for="prenom">Prénom</label>
					</div>
					<div class="form-floating mb-3">
						<input type="date" class="form-control" name="dateNais" id="dateNais" required>
						<label for="dateNais">Date de naissance</label>
					</div>
					<div class="form-floating mb-3">
						<select class="form-control" name="sexe" id="sexe" onchange="changeImage(this)" required>
							<option value="" hidden>Choisir un sexe</option>
						<?php
							$i=0;
							while($i < count($mesSexes)){
								echo "<option value='".$mesSexes[$i]->getId()."'>".$mesSexes[$i]->getLibelle()."</option>";
								++$i;
							}
						?>
						</select>
						<label for="sexe">Sexe</label>
					</div>
					<div class="form-floating mb-3">
						<select class="form-control" name="classe" id="classe" required>
							<option value="" hidden>Choisir une classe</option>
						<?php
							$i=0;
							while($i < count($mesClasses)){
								echo "<option value='".$mesClasses[$i]->getId()."'>".$mesClasses[$i]->getLibelleCourt().' - '.$mesClasses[$i]->getLibelle()."</option>";
								++$i;
							}
						?>
						</select>
						<label for="classe">Classe</label>
					</div>
					<div class="form-floating mb-3">
						<input type="date" class="form-control" name="dateEntree" id="dateEntree" required>
						<label for="dateEntree">Date d'entrée</label>
					</div>
					<div class="form-floating mb-3">
						<input type="date" class="form-control" name="dateSortie" id="dateSortie" required>
						<label for="dateSortie">Date de sortie</label>
					</div>
					<br>
					<div class="center">
						<a href="javascript:history.go(-1)" class='btn btn-danger'>Retour</a>
						<input class='btn btn-eleve' type='submit' value='Envoyer'>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
		function changeImage(param){
			var img = "public/img/"
			if(param.value == 1){
				img += "garcon.png"
			} else {
				img += "fille.png"
			}
			document.querySelector('.imgEleve').src = img;
		}
	</script>