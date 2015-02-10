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
    <title>Création d'un compte utilisateur</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="tp1-valider.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="ma_feuille_css_imprimante.css" type="text/css" media="print" />
</head>
<body>

<form method="post" action="">
    <p>Nom</p>
    <input type="text" name="nom" size="30"  placeholder="Entrez votre nom"/>
    <p>Prénom</p>
    <input type="text" name="prenom" size="30"  placeholder="Entrez votre prénom"/>

    <p>Profession/Rôle</p>
    <select name="profession">
        <option name="acu" value="Acupuncteur">Acupuncteur</option>
        <option name="med" value="Médecin">Médecin</option>
        <option name="chirur" value="Chirurgien">Chirurgien</option>
        <option name="patient" value="Patient">Patient</option>
        <option name="autre" value="Autre">Autre</option>
    </select>
    <p>E-mail</p>
    <input type="text" name="mail" size="30"  placeholder="Entrez votre e-mail"/>
    <p>Nom d'utilisateur</p>
    <input type="text" name="login" size="30"  placeholder="Entrez votre login"/>
    <p>Mot de passe</p>
    <input type="password" name="password" size="30" placeholder="Entrez votre password"/>
    </br></br>
    <button id="btncrea" name="creation" type="submit" >Créer le compte</button>
</form>

<?php
if (isset($_POST["creation"])) {
    $login=$bdd->quote($_POST["login"]);
    $password=$bdd->quote(md5($_POST["password"]));
    $mail=$bdd->quote($_POST["mail"]);
    $profession=$bdd->quote($_POST["profession"]);
    $prenom=$bdd->quote($_POST["prenom"]);
    $nom=$bdd->quote($_POST["nom"]);

    //test l'association login/password existe
    $sql="SELECT count(*) FROM `utilisateur` WHERE login=$login";
    $rep=$bdd->query($sql);
    $res = $rep->fetch(PDO::FETCH_COLUMN);
    if (!$res) { //si 0 => login libre
        //CREATION DE COMPTE
        $sql="INSERT INTO `utilisateur`(`login`, `nom`, `prenom`, `mail`, `profession`) VALUES ($login,$nom,$prenom,$mail,$profession)";
        $resAdd=$bdd->query($sql);
        if ($resAdd) {
            $msg = 'Création du compte :'. $login;
            $msg .= '\n   Nom :'. $nom;
            $msg .= '\n   Prénom :'. $prenom;
            $msg .= '\n   Mail :'. $mail;
            $msg .= '\n   Profession :'. $profession;
            ?>
            <script>if (confirm("<?php echo $msg; ?>")){ window.location.replace("login.php");}</script>
            <?php

        } else {
            $msg = "L'ajout n'a pas marché";?>

            <?php
        }
    } else { //res = 1 => login existant
        $msg='Le login ' . $login . ' est déjà utilisé';
    }?>

    <script>alert("<?php echo $msg; ?>");</script>
<?php
}
?>

</body>
</html>