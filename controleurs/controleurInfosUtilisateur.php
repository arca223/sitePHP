<?php
session_start();

require "../modeles/ConnexionBdd.php";
require "../modeles/Utilisateurs.php";




if (isset($_SESSION['compte']))
{
    $bdd = new ConnexionBDD();
    $user = new Utilisateurs($bdd);
    $infoUser = $user->getUtilisateur($_SESSION['compte']);
}
else
{
    echo "Vous n'êtes pas connecté !";
}

include_once "../ressources/layout/header.php";
include_once "../vues/vueInfoUtilisateur.php";
include_once "../ressources/layout/footer.php";