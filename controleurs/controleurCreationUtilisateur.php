<?php

require "../modeles/ConnexionBdd.php";
require "../modeles/Utilisateurs.php";

$bdd = new ConnexionBDD();

if (isset($_POST["creation"])) {

    $login=$_POST["login"];
    $password=md5($_POST["password"]);
    $mail=$_POST["mail"];
    $profession=$_POST["profession"];
    $prenom=$_POST["prenom"];
    $nom=$_POST["nom"];


    $user = new Utilisateurs($bdd);

    if ($login != "" && $password != "" && $mail != "" && $nom != "" && $prenom != "" ) {

        if (!$user->verifLogin($login)) {

            $resAddBis = $user->ajouterUser($login,$password);
            $resAdd = $user->ajouterUtilisateur($login,$nom,$prenom,$mail,$profession);

            if ($resAdd || $resAddBis) { // si création ok, msg d'info
                $msg = 'Création du compte :'. $login;
                $msg .= '\n   - Nom :'. $nom;
                $msg .= '\n   - Prénom :'. $prenom;
                $msg .= '\n   - Mail :'. $mail;
                $msg .= '\n   - Profession :'. $profession;

                //si la créa sur les deux bases est ok, on redirige sur la page de login (confirm) avec un msg pour prev le compte?>
                <script>if (confirm("<?php echo $msg; ?>")){ window.location.rcontroleurLce("../login.php");}</script>
                <?php


            } else {
                $msg = "L'ajout n'a pas marché";?>

            <?php
            }
        } else { //res = 1 => login existant
            $msg='Le login ' . $login . ' est déjà utilisé';
        }
    } else {
        $msg='Veuillez remplir tous les champs';
    }?>

    <script>alert("<?php echo $msg; ?>");</script>
<?php
}

include_once "../ressources/layout/header.php";
include_once "../vues/vueCreationUtilisateur.php";
include_once "../ressources/layout/footer.php";