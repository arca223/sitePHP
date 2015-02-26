<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Max TOMPOUCE
 * Date: 24/02/15
 * Time: 16:26
 * To change this template use File | Settings | File Templates.
 */

require "private/config.php";

//test l'association login/password existe
class Utilisateurs {

    protected $_db;


    public function Utilisateurs() {}

    /*public function Utilisateurs($bdd) {
        $this->_db = $bdd;
    }*/


    private function connexionBDD() {
        try {
            $bdd = new PDO('mysql:host='.HOST.';dbname='.DBNAME, LOGIN, PASSWORD);
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

        return $bdd;

    }


    public function ajouterUtilisateur($login, $nom, $prenom, $mail, $profession) {
        $bdd = $this->connexionBDD();

        $sql="INSERT INTO `utilisateur`(`login`, `nom`, `prenom`, `mail`, `profession`) VALUES ($login,$nom,$prenom,$mail,$profession)"; //données de l'users pour l'ajout
        $resAdd=$bdd->query($sql);
        if ($resAdd) { // si création ok, msg d'info
            return true;
        } else {
            return false;
        }
    }

    public function getUtilisateur($login) {
        $bdd = $this->connexionBDD();
        $ret = null;

        $sql="SELECT * FROM `utilisateur` WHERE `login`='$login'"; //récup des données de l'utilisateur
        $query=$bdd->query($sql);
        if ($res = $query->fetch()) { //select ok, récup du tableau dans res
            $ret = $res; //valeur de retour => table des infos de l'utilisateur
        }
        return $ret;
    }



}


