<?php

require "/private/config.php";

class ConnexionBDD extends PDO
{

    public function __construct() {
        try {
            parent::__construct('mysql:host='.HOST.';dbname='.DBNAME, LOGIN, PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }

}

