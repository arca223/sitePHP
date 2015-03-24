
<form action="controleurPathologies.php" method="post">
    <table>


        <div class="corps">
            <table class="tabpatho">
                <caption>Liste des pathologies</caption>
                <tr>
                    <th class="lp" id="nom_mer">Nom du méridien</th>
                    <th class="lp" id="type_patho">Type</th>
                </tr>
                <td>
                    <select name="nom[]" multiple="multiple">
                        <?php
                        foreach ($listeNom as $pathologie)
                        {
                            ?>

                                <option name="nom_mer"><?php echo $pathologie; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <select name="type[]" multiple="multiple">
                        <?php
                        foreach ($listeType as $pathologie)
                        {
                            ?>

                            <option name="type_patho"><?php echo $pathologie; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </td>
            </table>
        </div>





    </table>
</form>
