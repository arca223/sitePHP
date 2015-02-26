<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Max TOMPOUCE
 * Date: 24/02/15
 * Time: 16:00
 * To change this template use File | Settings | File Templates.
 */

require "../modeles/ConnexionBdd.php";
include_once "../modeles/Utilisateurs.php";


if (isset($_POST["creation"])) {
    $bdd = new ConnexionBDD();
    $login=$bdd->quote($_POST["login"]);
    $password=$bdd->quote(md5($_POST["password"]));
    $mail=$bdd->quote($_POST["mail"]);
    $profession=$bdd->quote($_POST["profession"]);
    $prenom=$bdd->quote($_POST["prenom"]);
    $nom=$bdd->quote($_POST["nom"]);


    $user = new Users($bdd);

    if ($user->verifLogin($login)) {

        $utilisateur = new Utilisateurs($bdd);

        $resAdd = $utilisateur->ajouterUtilisateur($login,$nom,$prenom,$mail,$profession);

        if ($resAdd) { // si création ok, msg d'info
            $msg = 'Création du compte :'. $login;
            $msg .= '\n   - Nom :'. $nom;
            $msg .= '\n   - Prénom :'. $prenom;
            $msg .= '\n   - Mail :'. $mail;
            $msg .= '\n   - Profession :'. $profession;

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


include_once "../vues/vueCreationUtilisateur.php";