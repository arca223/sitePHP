<?php

require "../modeles/Utilisateurs.php";

if (isset($_POST["connexion"])) {
    $login=$_POST["login"];
    $password=md5($_POST["password"]);
    //test l'association login/password existe

    $user = new Utilisateurs($bdd);
    if ($user->verifLogin($login)) {
        $_SESSION['compte']=$login;
        //à envoyer sur controleurInformations.php des que crée
?>
        <script>window.location.replace("../informations.php");</script>
<?php
    } else {
?>
        <script>alert("<?php echo "Erreur de connexion, mauvais login ou mot de passe"; ?>");</script>
<?php
    }
}

include_once "../ressources/layout/header.php";
include_once "../vues/vueLogin.php";
include_once "../ressources/layout/footer.php";