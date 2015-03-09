<?php
require "ConnexionBDD.php";

Class Pathologies {

    protected $_bdd;

    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }

    function get_listePatho()
    {
        $req = $bdd->prepare('SELECT nom_patho, type_patho, carac_patho FROM pathologies');
        $req->execute();
        $pathologies = $req->fetchAll();

        return $pathologies;
    }

    function recherchePatho($nomPatho)
    {
        $req = $this->_bdd->prepare('SELECT nom_patho, type_patho, carac_patho FROM pathologies WHERE nom_patho = ?');
        $req->bindParam($nomPatho);
        $req->execute();
        $patho = $req->fetch();

        return $patho;
    }

    function ajoutPatho($nomPatho,$typePatho,$caracPatho)
    {
        $req = $this->_bdd->prepare('SELECT nom_patho, type_patho, carac_patho FROM pathologies WHERE nom_patho = ? AND type_patho = ? AND carac_patho = ?');
        $req->bindParam(1, $nomPatho, PDO::PARAM_STR);
        $req->bindParam(2, $typePatho, PDO::PARAM_STR);
        $req->bindParam(3, $caracPatho, PDO::PARAM_STR);
        $req->execute();
        $ajout = $req->fetchAll();

        if ($ajout['nom_patho'] == $nomPatho && $ajout['type_patho'] == $typePatho && $ajout['carac_patho'] == $caracPatho)
        {
            $req = $this->_bdd->prepare('INSERT INTO pathologies (nom_patho,type_patho,carac_patho) VALUES (?,?,?)');
            $req->bindParam(1, $nomPatho, PDO::PARAM_STR);
            $req->bindParam(2, $typePatho, PDO::PARAM_STR);
            $req->bindParam(3, $caracPatho, PDO::PARAM_STR);
            $req->execute();
        }
    }

}

