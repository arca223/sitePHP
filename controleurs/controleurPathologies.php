<?php
session_start();

require "../modeles/ConnexionBdd.php";
require "../modeles/Pathologies.php";

$bdd = new ConnexionBDD();
$patho = new Pathologies($bdd);


$listePatho=array();

if (isset($_POST['recherchePatho'])) {
    $noms = isset($_POST["noms"]) ? $_POST["noms"] : null;
    $types1 = isset($_POST["types1"]) ? $_POST["types1"] : array();
    $types2 = isset($_POST["types2"]) ? $_POST["types2"] : array();

    $types = array_merge($types1,$types2);

    //recherche multiple nom et type
    $listePatho = $patho->recherchePatho($noms,$types);
} else if (isset($_POST['rechMotCle']) and isset($_SESSION['compte'])) {
    $motcle = isset($_POST['motcle']) ? $_POST['motcle'] : null;
    if ($motcle) {
        $listePatho = $patho->rechercheMotCle($motcle);
    }
} else {
    $listePatho = $patho->get_listePatho();
}


include_once "../ressources/layout/header.php";
include_once "../vues/vueAffichagePathologies.php";
include_once "../ressources/layout/footer.php";
