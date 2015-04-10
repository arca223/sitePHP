<?php
session_start();

require "../modeles/ConnexionBdd.php";
require "../modeles/Utilisateurs.php";

$bdd = new ConnexionBDD();
$patho = new Pathologies($bdd);

if (isset($_SESSION['compte']))
{
    $infoUser = getUtilisateur($_SESSION['compte']);
}
else
{
    echo "Vous n'êtes pas connecté !";
}

include_once "../ressources/layout/header.php";
include_once "../vues/vueAffichagePathologies.php";
include_once "../ressources/layout/footer.php";