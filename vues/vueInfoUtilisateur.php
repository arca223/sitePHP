<?php
?>
<title>Informations personnelles</title>
<div class="corps">
    <label for="nom">Nom :</label>
    <input id="nom" type="text" name="nom" size="30"  value="<?php echo $infoUser['nom']; ?>"/>
    <br /><br />
    <label for ="prenom">Prénom :</label>
    <input id="prenom" type="text" name="prenom" size="30"  value="<?php echo $infoUser['prenom']; ?>"/>
    <br /><br />
    <label for ="profession">Profession/Rôle :</label>
    <input id="profession" type="text" name="prenom" size="30"  value="<?php echo $infoUser['profession']; ?>"/>
    <br /><br />
    <label for ="mail">E-mail :</label>
    <input id="mail" type="text" name="mail" size="30"  value="<?php echo $infoUser['mail']; ?>"/>
    <br /><br />
    <label for ="login">Nom d'utilisateur :</label>
    <input id="login" type="text" name="login" size="30"  value="<?php echo $infoUser['login']; ?>"/>
    <br /><br />
</div>
