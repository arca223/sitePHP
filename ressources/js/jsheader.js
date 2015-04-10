
/*

//Pour la déco, changement de session
$('#unlog').on('click', function() {
    if (confirm("Are you sure you want to disconnect ?")){
        $.post('/controleurs/controleurLogin.php', {session:null}

    });
    return false;
});
*//*
document.getElementById("myImage").src = "landscape.jpg";

$( "#bandeau#onglets#connect" ).replaceWith( "<li><a href="/controleurs/controleurUnlog.php">Se déconnecter</a></li>" );
$('#connect').outerHTML("<li><a href="/controleurs/controleurUnlog.php">Se déconnecter</a></li>");

  
  $( "<li><a href="/controleurs/controleurRecherchePatho.php">Rechercher une pathologie</a></li>" ).insertAfter( "#rech" );


$(document).ready(function(){
header(session) {
  if (session!=null) {
  */
  
  $(document).ready(function(){
    
  $( '#onglets' ).add( "li" ).add( '<a href="/controleurs/indexControleur.php">Accueil</a>');
  $( '#onglets' ).add( "li" ).add( '<a href="/controleurs/controleurPathologies.php">Liste des pathologies</a>');
  $( '#onglets' ).add( "li" ).add( '<a href ="">W3C Validator</a>');
  $( '#onglets' ).add( "li" ).add( '<a href="">Contact</a>');
  $( '#onglets' ).add( "li" ).add( '<a href="/controleurs/controleurLogin.php">Se connecter</a>');
  });

  } else {
  
  
  $(document).ready(function(){
    
  $( '#onglets' ).add( "li" ).add( '<a href="/controleurs/indexControleur.php">Accueil</a>');
  $( '#onglets' ).add( "li" ).add( '<a href="/controleurs/controleurPathologies.php">Liste des pathologies</a>');
  $( '#onglets' ).add( "li" ).add( '<a href="/controleurs/controleurRecherchePatho.php">Rechercher une pathologie</a>');
  $( '#onglets' ).add( "li" ).add( '<a href ="">W3C Validator</a>');
  $( '#onglets' ).add( "li" ).add( '<a href="">Contact</a>');
  $( '#onglets' ).add( "li" ).add( '<a href="/controleurs/controleurInformations.php">Mes informations</a>');
  $( '#onglets' ).add( "li" ).add( '<a href="/controleurs/controleurUnlog.php">Se déconnecter</a>')
  });

  
  }

});