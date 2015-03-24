<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Max TOMPOUCE
 * Date: 24/02/15
 * Time: 16:26
 * To change this template use File | Settings | File Templates.
 */


class Utilisateurs {

    protected $_db;


    public function __construct($bdd) {
        $this->_db = $bdd;
    }




    public function ajouterUtilisateur($login, $nom, $prenom, $mail, $profession) {
        

        $req = $this->_db->prepare("INSERT INTO `utilisateurs`(`login`, `nom`, `prenom`, `mail`, `profession`) VALUES (?,?,?,?,?)");
        //$sql="INSERT INTO `utilisateurs`(`login`, `nom`, `prenom`, `mail`, `profession`) VALUES ($login,$nom,$prenom,$mail,$profession)"; //données de l'users pour l'ajout
        //$resAdd=$this->_db->query($sql);
        $req->bindParam(1, $login, PDO::PARAM_STR);
        $req->bindParam(2, $nom, PDO::PARAM_STR);
        $req->bindParam(3, $prenom, PDO::PARAM_STR);
        $req->bindParam(4, $mail, PDO::PARAM_STR);
        $req->bindParam(5, $profession, PDO::PARAM_STR);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage()); //récup d'erreur sql
        }
        if ($req) { // si création ok
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

    //fonctions pour les log/pw de la base users
    public function ajouterUser($login,$pass)
    {
        $req = $this->_db->prepare('INSERT INTO `users`(`login`, `password`) VALUES (?,?)');
        $req->bindParam(1, $login, PDO::PARAM_STR);
        $req->bindParam(2, $pass, PDO::PARAM_STR);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        if ($req) { // si création ok
            return true;
        } else {
            return false;
        }
    }

    public function verifLogin($login)
    {
        $req = $this->_db->prepare('SELECT login FROM `utilisateurs` WHERE `login`=?');
        $req->bindParam(1, $login, PDO::PARAM_STR);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_COLUMN);
        return $res;
    }



}


