<?php

class ConnexionBDD extends PDO
{
	public function ConnexionBDD
	{	
		$bdd = new PDO('mysql:host=localhost;dbname=sitePHP;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	  	return $bdd;
	}
}

