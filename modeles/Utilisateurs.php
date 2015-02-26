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
        

        $req = $this->_db->prepare("INSERT INTO `utilisateurs`(`login`, `nom`, `prenom`, `mail`, `profession`) VALUES (?,?,?,?,?)");
        //$sql="INSERT INTO `utilisateurs`(`login`, `nom`, `prenom`, `mail`, `profession`) VALUES ($login,$nom,$prenom,$mail,$profession)"; //données de l'users pour l'ajout
        //$resAdd=$this->_db->query($sql);
        $req->bindParam(1, $login, PDO::PARAM_STR);
        $req->bindParam(2, $nom, PDO::PARAM_STR);
        $req->bindParam(3, $prenom, PDO::PARAM_STR);
        $req->bindParam(4, $mail, PDO::PARAM_STR);
        $req->bindParam(5, $profession, PDO::PARAM_STR);
        $req->execute();
        if ($req) { // si création ok, msg d'info
            return true;
        } else {
            return false;
        }
    }

    public function getUtilisateur($login) {
        $ret = null;

        $prep = $this->_db->prepare("SELECT * FROM `utilisateurs` WHERE `login`=?");
        //$sql="SELECT * FROM `utilisateurs` WHERE `login`=$login"; //récup des données de l'utilisateur
        //$query=$this->_db->query($sql);
        $prep->bindParam(1, $login, PDO::PARAM_STR);
        $prep->execute();
        if ($res = $prep->fetch()) { //select ok, récup du tableau dans res
            $ret = $res; //valeur de retour => table des infos de l'utilisateur
        }
        return $ret;
    }



}


