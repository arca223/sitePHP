<?php

try {
    //$bdd = new PDO('mysql:host=ccsddb01.in2p3.fr;dbname=ISIDORE','ccsd_sql','pap5e2008');
    $bdd = new PDO('mysql:host=localhost;dbname=sitephp', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Création d'un compte</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link href="tp1-valider.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="ma_feuille_css_imprimante.css" type="text/css" media="print" />
</head>
<body>

<form method="post" action="">
    <p>Nom d'utilisateur</p>
    <input type="text" name="login" size="30"  placeholder="Entrez votre login" <?php if (isset($_POST['login'])){ echo "value ='".$_POST['login']."'";} ?>/>
    </br>
    <p>Mot de passe</p>
    <input type="password" name="password" size="30" placeholder="Entrez votre password"/>
    </br></br>
    <button name="connexion" type="submit" >Connexion</button>
</form>
<form method="post" action="creationUtilisateur.html">
    <p>Si vous n'avez pas de compte</p>
    <button name="register" type="submit" >S'enregistrer</button>
</form>

<?php
if (isset($_POST["connexion"])) {
    $login=$_POST["login"];
    $password=md5($_POST["password"]);
    //test l'association login/password existe
    $sql="SELECT count(*) FROM `users` WHERE login='$login' AND password='$password'";
    $rep=$bdd->query($sql);
    $res = $rep->fetch(PDO::FETCH_COLUMN);
    if ($res) { //si 1 => connexion
        /* POUR LA CREATION DE COMPTE
        $sql="INSERT INTO login ('login','password') VALUES ($login,$password)";
        $resAdd=$bdd->query($sql);
        if ($resAdd) {
            echo "ajout ok";
        }
        */
        $_SESSION['compte']=$login;
        header('Location: informations.html');
    }

}

?>
</body>
</html>