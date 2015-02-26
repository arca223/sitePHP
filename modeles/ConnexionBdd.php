<?php

class ConnexionBDD extends PDO
{

    public function __construct() {
        try {
            $bdd = new PDO('mysql:host='.HOST.';dbname='.DBNAME, LOGIN, PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

        return $bdd;
    }

}

