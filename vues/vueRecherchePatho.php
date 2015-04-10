

<div class="corps">

    <form class="corps" action="controleurPathologies.php" method="post">

        <div>

            <br />
            <input type="text" name="motcle" size=30 placeholder="Mot clé" />
            <br /><br />
            <button name="rechMotCle" type="submit">Rechercher</button>

        </div>

        <table>

            <table class="tabpatho">
                <caption>Liste des pathologies</caption>
                <tr>
                    <th class="lp" id="nom_mer">Nom du méridien</th>
                    <th colspan="2" class="lp" id="type_patho">Type</th>
                </tr>
                <td class="notalign">
                    <?php
                    foreach ($listeNom as $pathologie)
                    {
                        $i=0;
                        ?>
                        <input type="checkbox" name="noms[]" value=<?php echo "'$pathologie'/>$pathologie"; ?><br>
                    <?php
                    }
                    ?>
                </td>
                <td class="notalign">
                    <?php
                    for ($i=0 ; $i < $row ; $i++)
                    {
                        ?>
                        <input type="checkbox" name="types1[]" value=<?php echo "'$listeType[$i]'/>$listeType[$i]"; ?><br>
                    <?php
                    }
                    ?>
                </td>
                <td class="notalign" id="typecolumn">
                    <?php
                    for ($i=$row ; $i < $row2+$row ; $i++)
                    {
                        ?>
                        <input type="checkbox" name="types2[]" value=<?php echo "'$listeType[$i]'/>$listeType[$i]"; ?><br>
                    <?php
                    }
                    ?>
                </td>
            </table>

        </table>
        <br /><br />
        <button name="recherchePatho" type="submit" >Rechercher</button>

    </form>
</div>