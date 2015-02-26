<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Max TOMPOUCE
 * Date: 24/02/15
 * Time: 16:26
 * To change this template use File | Settings | File Templates.
 */
require "private/config.php";
require "Users.php";

class Utilisateurs {

    protected $_db;
    protected $_users;


    public function __construct($bdd) {
        $this->_db = $bdd;
    }


    /*
    private function connexionBDD() {
        try {
            $bdd = new PDO('mysql:host='.HOST.';dbname='.DBNAME, LOGIN, PASSWORD);
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

        return $bdd;

    }*/


    public function ajouterUtilisateur($login, $nom, $prenom, $mail, $profession) {
        

        $sql="INSERT INTO `utilisateurs`(`login`, `nom`, `prenom`, `mail`, `profession`) VALUES ($login,$nom,$prenom,$mail,$profession)"; //données de l'users pour l'ajout
        $resAdd=$this->_db->query($sql);
        if ($resAdd) { // si création ok, msg d'info
            return true;
        } else {
            return false;
        }
    }

    public function getUtilisateur($login) {
        $ret = null;

        $sql="SELECT * FROM `utilisateurs` WHERE `login`='$login'"; //récup des données de l'utilisateur
        $query=$this->_db->query($sql);
        if ($res = $query->fetch()) { //select ok, récup du tableau dans res
            $ret = $res; //valeur de retour => table des infos de l'utilisateur
        }
        return $ret;
    }



}


