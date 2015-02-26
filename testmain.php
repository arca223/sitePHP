<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Max TOMPOUCE
 * Date: 26/02/15
 * Time: 11:37
 * To change this template use File | Settings | File Templates.
 */

require "modeles/Utilisateurs.php";

$u = new Utilisateurs();
$res=$u->getUtilisateur("arca");
var_dump($res);