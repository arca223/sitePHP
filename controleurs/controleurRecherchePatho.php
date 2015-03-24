<?php


require "../modeles/ConnexionBdd.php";
require "../modeles/Pathologies.php";


$bdd = new ConnexionBDD();
$patho = new Pathologies($bdd);

$listeNom = array();
$listeType = array();
$listeMeri = $patho->get_listeMEridien();

foreach ($listeMeri as $x) {
    array_push($listeNom, $x['nom']);
    array_push($listeType, $x['type']);
}

$listeNom = array_unique($listeNom);
$listeType = array_unique($listeType);

include_once "../ressources/layout/header.php";
include_once "../vues/vueRecherchePatho.php";
include_once "../ressources/layout/footer.php";