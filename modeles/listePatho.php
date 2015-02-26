<?php
function get_listePatho()
{
    global $bdd;
        
    $req = $bdd->prepare('SELECT nom_patho, type_patho, carac_patho FROM pathologies');
    $req->execute();
    $pathologies = $req->fetchAll();
        
    return $pathologies;
}

