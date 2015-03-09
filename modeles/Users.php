<?php
require "ConnexionBDD.php";

class Users {

	protected $_bdd;	
	
	public function __construct()
	{
		$this->_bdd = new ConnexionBDD();
	}

    public function __constructExist()
    {

    }

	public function ajouterUser($login,$pass)
	{
     	$req = $this->_bdd->prepare('INSERT INTO `users`(`login`, `password`) VALUES (?,?)');
		$req->bindParam(1, $login, PDO::PARAM_STR);
		$req->bindParam(2, $pass, PDO::PARAM_STR);
		$req->execute();
        return $req;
	}
	
	public function verifLogin($login)
	{
		$req = $this->_bdd->prepare('SELECT login FROM `utilisateurs` WHERE `login`=?');
		$req->bindParam(1, $login, PDO::PARAM_STR);
		$req->execute();
		$res = $req->fetch(PDO::FETCH_COLUMN);
		return $res;
	}


}
