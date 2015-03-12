<?php

require "../modeles/ConnexionBdd.php";
include_once "../modeles/Pathologies.php";

$listePatho = get_listPatho();

include_once "../vues/vueAffichagePathologies.php";
