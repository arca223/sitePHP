<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Max TOMPOUCE
 * Date: 24/02/15
 * Time: 16:59
 * To change this template use File | Settings | File Templates.
 */

class Users {

    public function ajouterUser() {



        $sql="INSERT INTO `users`(`login`, `password`) VALUES ($login,$password)"; //création du compte
        //$resAdd=$bdd->query($sql);
        //
    }


    public function verifLogin() {
        $sql="SELECT count(*) FROM `utilisateur` WHERE login=$login";
        $rep=$bdd->query($sql);
        $res = $rep->fetch(PDO::FETCH_COLUMN);
        if (!$res) { //si 0 => login libre
            //CREATION DE COMPTE


        }
    }


}