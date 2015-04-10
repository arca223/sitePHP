<?php
session_start();

require "../modeles/ConnexionBdd.php";
require "../modeles/Utilisateurs.php";




$bdd = new ConnexionBDD();
$user = new Utilisateurs($bdd);
$infoUser = $user->getUtilisateur($_SESSION['compte']);


include_once "../ressources/layout/header.php";
include_once "../vues/vueInfoUtilisateur.php";
include_once "../ressources/layout/footer.php";