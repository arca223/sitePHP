<?php

require 'ConnexionBdd';

global $bdd;

function get_listePatho()
{ 
	$req = $bdd->prepare('SELECT nom_patho, type_patho, carac_patho FROM pathologies');
	$req->execute();
	$pathologies = $req->fetchAll();
        
	return $pathologies;
}

function recherchePatho($nomPatho)
{
	$req = $bdd->prepare('SELECT nom_patho, type_patho, carac_patho FROM pathologies WHERE nom_patho = '.$nomPatho.'');
	$req->execute();
	$patho = $req->fetch();
	
	return $patho;	
}
