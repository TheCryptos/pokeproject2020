<div class="">
  <ul>
    <h3>Poids moyen des pokemons de la 4ème génération</h3>
    <p>Résultat = <?= h($query1->first()->PoidsMoyen) ?></p>

    <h3>Nombre de pokemons de type fée entre les générations 1,3 et 7</h3>
    <p>Résultat = <?= h($query2->first()->NombresPokemonsFée) ?></p>

    <h3>Les 10 premiers pokemons qui possède la plus grande vitesse</h3>
    <ul>
      <?php
        $i=0;
        foreach ($query3 as $pokemons) { ?>
          <li><?php echo $pokemons;  ?></li>
          <?php
          $i++;
        }
      ?>
    </ul>
  </ul>
</div>
