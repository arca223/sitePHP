<div class="corps">
   <table class="tabpatho">
       <caption>Liste des pathologies</caption>
       <tr>
           <th class="lp" id="nom_mer">Nom du méridien</th>
           <th class="lp" id="type_patho">Type(s) des pathologies</th>
           <th class="lp" id="carac_patho">Caractéristique(s) des pathologies</th>
           <th class="lp" id="elem">Element</th>
           <th class="lp" id="yin">Yin</th>
           <th class="lp" id="desc">Description</th>
       </tr>
   <?php
   foreach ($listePatho as $pathologie)
   {
       ?>
       <tr>
           <td headers="nom_mer"><?php echo $pathologie['nom']; ?></td>
           <td headers="type_patho"><?php echo $pathologie['type']; ?></td>
           <td headers="carac_patho"><?php echo $pathologie['carac']; ?></td>
           <td headers="elem"><?php echo $pathologie['element']; ?></td>
           <td headers="yin"><?php echo $pathologie['yin']; ?></td>
           <td headers="yin"><?php echo $pathologie['desc']; ?></td>
       </tr>
   <?php
   }
   ?>
   </table>
</div>
