<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Max TOMPOUCE
 * Date: 26/02/15
 * Time: 11:37
 * To change this template use File | Settings | File Templates.
 */

require "modeles/ConnexionBdd.php";
require "modeles/Utilisateurs.php";
$bdd = new ConnexionBDD();
$u = new Utilisateurs($bdd);
$us = new Users($bdd);
$res=$u->getUtilisateur("arca");
var_dump($res);

var_dump($res2=$us->verifLogin("azregtrrca"));