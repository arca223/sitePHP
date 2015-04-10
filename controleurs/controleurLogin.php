<?php
session_start();
require "../modeles/Utilisateurs.php";
require "../modeles/ConnexionBdd.php";


if (isset($_GET['session'])) {
    session_unset();
    session_destroy();
}

if (isset($_POST["connexion"])) {
    $login=$_POST["login"];
    $password=md5($_POST["password"]);
    //test l'association login/password existe

    $bdd = new ConnexionBDD();
    $user = new Utilisateurs($bdd);
    if ($user->verifConnexion($login,$password)) {
        $_SESSION['compte']=$login;
        //à envoyer sur controleurInformations.php des que crée
?>
        <script>window.location.replace("controleurInfosUtilisateur.php");</script>
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