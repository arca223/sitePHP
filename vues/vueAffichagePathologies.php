<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Liste des pathologies</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="tp1-valider.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="ma_feuille_css_imprimante.css" type="text/css" media="print" />
</head>
<body>
<table>
	<caption>Liste des pathologies</caption>
	<tr>
		<th>Nom des pathologies</th>
		<th>Type(s) des pathologies</th>
		<th>Caractéristique(s) des pathologies</th>
	</tr>
<?php
foreach ($listePatho as $pathologie)
{
	?>
	<tr>
		<th><?php echo $pathologie['nom_patho']; ?>
		<th><?php echo $pathologie['type_patho']; ?>
		<th><?php echo $pathologie['carac_patho']; ?>
	</tr>
<?php
}
?>
</body>
</html>
