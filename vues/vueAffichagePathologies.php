
<body>
<table class="tabpatho">
	<caption>Liste des pathologies</caption>
	<tr>
		<th class="lp" id="nom_mer">Nom du méridien</th>
		<th class="lp" id="type_patho">Type(s) des pathologies</th>
		<th class="lp" id="carac_patho">Caractéristique(s) des pathologies</th>
        <th class="lp" id="elem">Element</th>
        <th class="lp" id="yin">Yin</th>
	</tr>
<?php
foreach ($listePatho as $pathologie)
{
	?>
	<tr>
		<td id="lp" headers="nom_mer"><?php echo $pathologie['nom']; ?></td>
		<td id="lp" headers="type_patho"><?php echo $pathologie['type']; ?></td>
		<td id="lp" headers="carac_patho"><?php echo $pathologie['desc']; ?></td>
        <td id="lp" headers="elem"><?php echo $pathologie['element']; ?></td>
        <td id="lp" headers="yin"><?php echo $pathologie['yin']; ?></td>
	</tr>
<?php
}
?>
</table>
</body>

