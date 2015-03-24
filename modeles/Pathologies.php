<?php


Class Pathologies {

    protected $_bdd;


    public function __construct($bdd) {
        $this->_bdd = $bdd;
    }

    function get_listePatho()
    {
        $req = $this->_bdd->prepare('SELECT * FROM `patho` LEFT JOIN meridien as me on patho.mer=me.code ');
        $req->execute();
        $pathologies = $req->fetchAll();

        return $pathologies;
    }

    function recherchePatho($nom)
    {
        $req = $this->_bdd->prepare("SELECT me.nom, me.element, me.yin, patho.'type', patho.'desc' FROM patho, meridien as me WHERE nom = ? and me.code=patho.mer");
        $req->bindParam($nom);
        $req->execute();
        $patho = $req->fetchAll();

        return $patho;
    }

    /*
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
    }*/

    function get_listeNomPatho()
    {
        $req = $this->_bdd->prepare('SELECT nom_patho FROM patho');
        $req->execute();
        $listeNomPathologies = $req->fetchAll();

        return $listeNomPathologies;
    }

    function get_listeTypePatho()
    {
        $req = $this->_bdd->prepare('SELECT nom_patho FROM patho');
        $req->execute();
        $listeTypePathologies = $req->fetchAll();

        return $listeTypePathologies;
    }

    function get_listeCaracPatho()
    {
        $req = $this->_bdd->prepare('SELECT nom_patho FROM patho');
        $req->execute();
        $listeCaracPathologies = $req->fetchAll();

        return $listeCaracPathologies;
    }
}
