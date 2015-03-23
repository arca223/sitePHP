<?php

require "../modeles/ConnexionBdd.php";
include_once "../modeles/Pathologies.php";

$listePatho = get_listPatho();



include_once "../ressources/layout/header.php";
include_once "../vues/vueAffichagePathologies.php";
include_once "../ressources/layout/footer.php";
