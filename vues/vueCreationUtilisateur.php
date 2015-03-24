<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Création d'un compte utilisateur</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="tp1-valider.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="ma_feuille_css_imprimante.css" type="text/css" media="print" />
</head>
<body>

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

</body>
