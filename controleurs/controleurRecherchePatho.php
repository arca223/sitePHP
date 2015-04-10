<?php
session_start();

require "../modeles/ConnexionBdd.php";
require "../modeles/Pathologies.php";

$bdd = new ConnexionBDD();
$patho = new Pathologies($bdd);

$listeNom = $patho->get_listeNomMeridien();
$listeType = $patho->get_listeTypeMeridien();


//on récup le compte des noms pour avoir la même colonne, puis le reste sera sur un second span
$row=count($listeNom);
$row2=count($listeType)-$row;

include_once "../ressources/layout/header.php";
include_once "../vues/vueRecherchePatho.php";
include_once "../ressources/layout/footer.php";