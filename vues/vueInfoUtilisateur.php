<?php
?>
<title>Informations personnelles</title>
<div class="corps">
    <p>Vos informations, cher <strong><?php echo $infoUser['login']; ?></strong> :</p>
    <label for="nom">Nom : <?php echo $infoUser['nom'];?></label>
    <br /><br />
    <label for ="prenom">Prénom : <?php echo $infoUser['prenom']; ?></label>
    <br /><br />
    <label for ="profession">Profession/Rôle : <?php echo $infoUser['profession']; ?></label>
    <br /><br />
    <label for ="mail">E-mail : <?php echo $infoUser['mail']; ?></label>
    <br /><br />
</div>
