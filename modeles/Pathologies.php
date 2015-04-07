<?php


Class Pathologies {

    protected $_bdd;


    public function __construct($bdd) {
        $this->_bdd = $bdd;
        $bdd->exec("SET CHARACTER SET UTF8");
    }

    /**
     * @return mixed
     */
    function get_listePatho()
    {
        $req = $this->_bdd->prepare('SELECT nom, mer, patho.desc, patho.type, yin, element FROM `patho` LEFT JOIN meridien as me on patho.mer=me.code ');
        $req->execute();
        $pathologies = $req->fetchAll();

        return $pathologies;
    }

    /**
     * Retourne un tableau de string liste avec nom des méridiens et noms des types possibles en doublons, associations
     * @return mixed
     *
     */

    function get_listeMeridien()
    {
        $req = $this->_bdd->prepare('SELECT me.nom, patho.type FROM `patho` LEFT JOIN meridien as me on patho.mer=me.code');
        $req->execute();
        $pathologies = $req->fetchAll();

        return $pathologies;
    }


    /**
     *  Retourne un tablerau de string des types de méridiens
     * @return mixed
     *
     */
    function get_listeTypeMeridien()
    {
        $req = $this->_bdd->prepare('SELECT DISTINCT patho.type FROM `patho` LEFT JOIN meridien as me on patho.mer=me.code');
        $req->execute();
        $res = $req->fetchAll();

        $types = array();

        foreach ($res as $x) {
            array_push($types, $x['type']);
        }

        return $types;
    }

    /**
     * Retourne un tableau de string des noms de méridiens
     * @return mixed
     */
    function get_listeNomMeridien()
    {
        $req = $this->_bdd->prepare('SELECT DISTINCT me.nom FROM `patho` LEFT JOIN meridien as me on patho.mer=me.code');
        $req->execute();
        $res = $req->fetchAll();

        $noms = array();

        foreach ($res as $x) {
            array_push($noms, $x['nom']);
        }

        return $noms;
    }

    /**
     * Noms et typesde patho associés à des noms et types
     * @param $nom
     * @param $type
     * @return mixed
     *
     */
    function recherchePatho($noms,$types)
    {
        $row = count($noms);
        $sqlNoms = 'nom="' . $noms[0] . '"';
        for ($i=1 ; $i < $row ; $i++) {
            $sqlNoms = $sqlNoms . ' OR nom="' . $noms[$i] . '"';
        }

        $row = count($types);
        $sqlTypes = 'patho.type="'. $types[0] . '"';
        for ($i=1 ; $i < $row ; $i++) {
            $sqlTypes = $sqlTypes . ' OR patho.type="' . $noms[$i] . '"';
        }

        $sql = "SELECT nom, mer, patho.desc, patho.type, yin, element FROM patho LEFT JOIN meridien as me on patho.mer=me.code WHERE $sqlNoms and $sqlTypes";

        //impo de préparer car sinon ça ne renvoit rien, du coup on part sur un query de base, mais c'est que des checkbox donc aucun soucis
        /*$req = $this->_bdd->prepare("SELECT me.nom, patho.type FROM patho, meridien as me WHERE ? and ?");
        $req->bindParam(1, $sqlNoms, PDO::PARAM_STR);
        $req->bindParam(2, $sqlTypes, PDO::PARAM_STR);
        $req->execute();*/

        $req = $this->_bdd->query($sql);
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

    /**
     * Retourne la liste des noms de patho
     * @return mixed
     */


}
