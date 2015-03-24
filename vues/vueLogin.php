
<div class="corps">

    <form method="post" action="">
        <p>Nom d'utilisateur</p>
        <input type="text" name="login" size="30"  placeholder="Entrez votre login"/>
        </br>
        <p>Mot de passe</p>
        <input type="password" name="password" size="30" placeholder="Entrez votre password"/>
        </br></br>
        <button name="connexion" type="submit" >Connexion</button>
    </form>
    <form method="post" action="controleurCreationUtilisateur.php">
        <p>Si vous n'avez pas de compte :</p>
        <button name="register" type="submit" >S'enregistrer</button>
    </form>

</div>

