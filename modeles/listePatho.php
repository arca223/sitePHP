<?php
require "ConnexionBDD.php";
Class ListePatho {

    protected $_bdd;

    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }


    function get_listePatho()
    {
        $req = $this->_bdd->prepare('SELECT nom_patho, type_patho, carac_patho FROM pathologies');
        $req->execute();
        $pathologies = $req->fetchAll();

        return $pathologies;
    }
}
