<?php

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Page d\'accueil</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link href="/ressources/css/style.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="ma_feuille_css_imprimante.css" type="text/css" media="print" />
	<div id="banniere">
		<header>
			 <img src="/ressources/img/acu.jpg" alt="Acupuncture chinoise" width=100% height=300px>
		</header>
	</div>
	<div id="bandeau">
		<ul id="onglets">
			<li><a href="/controleurs/indexControleur.php"> Accueil </a></li>
			<li><a href="/controleurs/controleurPathologies.php"> Liste des pathologies </a></li>
			<li class="boutonD"><a href="/controleurs/controleurLogin.php"> Se connecter </a></li>
		</ul>
	</div>
</head>
<body>

</body>
</html>
';