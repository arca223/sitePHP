<?php

require 'ConnexionBdd.php';

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
	$req = $bdd->prepare('SELECT nom_patho, type_patho, carac_patho FROM pathologies WHERE nom_patho = ?');
	$req->bindParam($nom);
	$nom = $nomPatho;
	$req->execute();
	$patho = $req->fetch();
	
	return $patho;
}

function ajoutPatho($nomPatho,$typePatho,$caracPatho)
{
	$req = $bdd->prepare('SELECT nom_patho, type_patho, carac_patho FROM pathologies WHERE nom_patho = ? AND type_patho = ? AND carac_patho = ?');
	$req->bindParam(1, $nomPatho, PDO::PARAM_STR);
	$req->bindParam(2, $typePatho, PDO::PARAM_STR);
	$req->bindParam(3, $caracPatho, PDO::PARAM_STR);
	$req->execute();
	$ajout = $req->fetchAll();
	
	if ($ajout['nom_patho'] == $nomPatho && $ajout['type_patho'] == $typePatho && $ajout['carac_patho'] == $caracPatho)
	{
		$req = $bdd->prepare('INSERT INTO pathologies (nom_patho,type_patho,carac_patho) VALUES (?,?,?)');
		$req->bindParam(1, $nomPatho, PDO::PARAM_STR);
		$req->bindParam(2, $typePatho, PDO::PARAM_STR);
		$req->bindParam(3, $caracPatho, PDO::PARAM_STR);
		$req->execute();	
	}
}

function get_listeNomPatho()
{
	$req = $bdd->prepare('SELECT nom_patho FROM pathologies');
	$req->execute();
	$listeNomPathologies = $req->fetchAll();
        
	return $listeNomPathologies;
}

function get_listeTypePatho()
{
	$req = $bdd->prepare('SELECT nom_patho FROM pathologies');
	$req->execute();
	$listeTypePathologies = $req->fetchAll();
        
	return $listeTypePathologies;
}

function get_listeCaracPatho()
{
	$req = $bdd->prepare('SELECT nom_patho FROM pathologies');
	$req->execute();
	$listeCaracPathologies = $req->fetchAll();
        
	return $listeCaracPathologies;
}
