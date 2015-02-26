<?php

class Users {

	protected $_bdd;	
	
	public function __construct($bdd)
	{
		$this->_bdd = $bdd;
	}

	public function ajouterUser($login,$pass)
	{
     	$req = $this->_bdd->prepare('INSERT INTO `users`(`login`, `password`) VALUES (?,?)');
		$req->bindParam(1, $login, PDO::PARAM_STR);
		$req->bindParam(2, $pass, PDO::PARAM_STR);
		$req->execute();
		$login = $req->fetchAll();
	}
	
	public function verifLogin($login)
	{
		$req = $this->_bdd->prepare('SELECT login FROM utilisateurs WHERE login = ?');
		$req->bindParam($login, PDO::PARAM_STR);
		$req->execute();
		$res = $req->fetch();
		return $res;
	}


}
