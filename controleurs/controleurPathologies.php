<?php

require "../modeles/ConnexionBdd.php";
require "../modeles/Pathologies.php";


$bdd = new ConnexionBDD();
$patho = new Pathologies($bdd);

$listePatho = $patho->get_listePatho();



include_once "../ressources/layout/header.php";
include_once "../vues/vueAffichagePathologies.php";
include_once "../ressources/layout/footer.php";
