

var url="/controleurs/controleurLogin.php";
var data=true;


//Pour la déco, changement de session
$('#unlog').on('click', function() {
    if (confirm("Are you sure you want to disconnect ?")){
        $.ajax({
            type: "POST",
            url: url,
            data: data
        });
    };
    return false;
});
/*
document.getElementById("myImage").src = "landscape.jpg";

$( "#bandeau#onglets#connect" ).replaceWith( "<li><a href="/controleurs/controleurUnlog.php">Se déconnecter</a></li>" );
$('#connect').outerHTML("<li><a href="/controleurs/controleurUnlog.php">Se déconnecter</a></li>");

  
  $( "<li><a href="/controleurs/controleurRecherchePatho.php">Rechercher une pathologie</a></li>" ).insertAfter( "#rech" );


$(document).ready(function(){
header(session) {

  */
//var session = document.getElementsById('session');


$(document).ready(function(){
    if (session==null) {

        $( '#onglets' ).append( '<li><a href="/controleurs/indexControleur.php">Accueil</a></li>');
        $( '#onglets' ).append( '<li><a href="/controleurs/controleurPathologies.php">Liste des pathologies</a></li>');
        $( '#onglets' ).append( '<li><a href="/controleurs/controleurLogin.php">Se connecter</a></li>');

    } else {

        $( '#onglets' ).append( '<li><a href="/controleurs/indexControleur.php">Accueil</a></li>');
        $( '#onglets' ).append( '<li><a href="/controleurs/controleurPathologies.php">Liste des pathologies</a></li>');
        $( '#onglets' ).append( '<li><a href="/controleurs/controleurRecherchePatho.php">Rechercher une pathologie</a></li>');
        $( '#onglets' ).append( '<li><a href="/controleurs/controleurInfosUtilisateur.php">Mes informations</a></li>');
        $( '#onglets' ).append( '<li><a href="/controleurs/controleurLogin.php">Se déconnecter</a></li>')
    }

});