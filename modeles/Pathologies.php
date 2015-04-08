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
        $req = $this->_bdd->prepare('SELECT nom, mer, patho.desc as carac, patho.type, yin, element, s.desc FROM `patho` LEFT JOIN meridien as me on patho.mer=me.code JOIN symptpatho as sp on sp.idP=patho.idP JOIN symptome as s on s.idS=sp.idS ORDER BY nom');
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
        /*$row = count($noms)-1;
        $sqlNoms = 'nom="' . $noms[0] . '"';
        for ($i=1 ; $i < $row ; $i++) {
            $sqlNoms = $sqlNoms . ' OR nom="' . $noms[$i] . '"';
        }*/

        $sql="";

        if (! empty($noms) && !empty($types)) {
            var_dump(2);
            $sqlNoms = join('","',$noms);
            $sqlTypes = join('","',$types);
            $sql='SELECT me.nom, patho.type, patho.desc, yin, element FROM patho, meridien as me WHERE me.nom in ("'.$sqlNoms.'") and patho.type in ("'.$sqlTypes.'") and me.code=patho.mer';
        } else if (! empty($noms)) { //type vide, sinon on serait dans le cas avant
            var_dump("noms");
            $sqlNoms = join('","',$noms);
            $sql='SELECT me.nom, patho.type, patho.desc, yin, element FROM patho, meridien as me WHERE me.nom in ("'.$sqlNoms.'") and me.code=patho.mer';
        } else {
            var_dump("types");
            $sqlTypes = join('","',$types);
            $sql='SELECT me.nom, patho.type, patho.desc, yin, element FROM patho, meridien as me WHERE patho.type in ("'.$sqlTypes.'") and me.code=patho.mer';
        }


        /*$row = count($types)-1;
        $sqlTypes = 'patho.type="'. $types[0] . '"';
        for ($i=1 ; $i < $row ; $i++) {
            $sqlTypes = $sqlTypes . ' OR patho.type="' . $types[$i] . '"';
        }*/



        //$sql = "SELECT nom, mer, patho.desc, patho.type, yin, element FROM patho LEFT JOIN meridien as me on patho.mer=me.code WHERE $sqlNoms and $sqlTypes";
        //impo de préparer car sinon ça ne renvoit rien, du coup on part sur un query de base, mais c'est que des checkbox donc aucun soucis
        /*$req = $this->_bdd->prepare('SELECT me.nom, patho.type, patho.desc, yin, element FROM patho, meridien as me WHERE me.nom in ("?") and patho.type in ("?") and me.code=patho.mer');
        $req->bindParam(1, $sqlNoms, PDO::PARAM_STR);
        $req->bindParam(2, $sqlTypes, PDO::PARAM_STR);
        $req->execute();
        $req->debugDumpParams();
        $req->errorInfo();*/
        $req = $this->_bdd->query($sql);
        $patho = $req->fetchAll();

        return $patho;
    }

    function rechercheMotCle($mot) {
        $mot = "%" . $mot . "%";
        $req = $this->_bdd->prepare('SELECT nom, mer, patho.desc as carac, patho.type, yin, element, s.desc FROM `patho` JOIN meridien as me on patho.mer=me.code JOIN symptpatho as sp on sp.idP=patho.idP JOIN keysympt as ks on ks.idS=sp.idS JOIN symptome as s on s.idS=sp.idS JOIN keywords as kw on kw.idK=ks.idK WHERE kw.name LIKE ?  ');
        $req->bindParam(1, $mot, PDO::PARAM_STR);
        $req->execute();
        $pathologies = $req->fetchAll();

        return $pathologies;
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
