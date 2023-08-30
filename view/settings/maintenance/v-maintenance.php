<!doctype html>
    <title>Maintenance - DSI App</title>
    <style>
        body { text-align: center; padding: 50px; }
        h1 { font-size: 50px; }
        body { font: 20px Helvetica, sans-serif; color: #333; }
        article { display: block; text-align: left; width: 650px; margin: 0 auto; }
        a { color: #dc8100; text-decoration: none; }
        a:hover { color: #333; text-decoration: none; }
        hr { border: 0; border-top-width: 0px; border-top-style: none; border-top-color: currentcolor; border-top: 1px solid #eee; }
    </style>

    <article>
        <h1>Maintenance</h1>
        <div>
            <p>L'application DSI App sera de nouveau fonctionnelle d'ici quelques minutes.
            Cependant il est possible de récupérer le mot de passe d'un utilisateur avec le formulaire ci-dessous.</p>
            <p>&mdash; Les Applicateurs ;-)</p>
        </div>
    </article>

<br><br>
<hr>
<br><br>
    <form action="" method="post">
        <label for="pass">Mot de passe Administrateur : </label>
        <input type="password" name="pass" id="pass">
        <br>
        <br>
        <label for="login">Identifiant de connexion : </label>
        <input type="text" name="login" id="login">
        <br>
        <br>
        <input type="submit" value="Envoyer">
    </form>
<br><br><br>

<?php

if (isset($_POST) && !empty($_POST['pass']) && !empty($_POST['login'])){
    if (sha1($_POST['pass']) == "af242bd760d628f1c6929dd877a52cb3c9ebdfcd"){
        require "model/mdpuser.php";
        require "model/Openssl.php";

        $monUser = new mdpuser();
        if ($monUser->userExist($_POST['login'])){
            $idUser = $monUser->findIdByLogin($_POST['login']);
            $monUser->retrieve($idUser);

            echo "Matricule : ".$monUser->getMatricule()."<br>";
            echo "Nom prénom : ".$monUser->getNomPrenom()."<br>";
            echo "Login : ".$monUser->getLogin()."<br>";
            echo "Mot de passe initial : ".openssl::Decrypt($monUser->getPass())."<br>";
            echo "Mot de passe v2 : ".openssl::Decrypt($monUser->getPass2())."<br>";
        } else {
            echo "Cet utilisateur n'existe pas dans la base";
        }
    } else {
        echo "Mot de passe administrateur incorrecte !";
    }
}

?>
