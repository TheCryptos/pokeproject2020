<div class="content">
  <ul>
    <h3>Poids moyen des pokémon de la 4ème génération</h3>
    <p class="resultat">Résultat = <?= h($query1->first()->PoidsMoyen) ?></p>

      <h3>Nombre de pokémon de type fée entre les générations 1,3 et 7</h3>
      <p class="resultat">Résultat = <?= h($query2->count()) ?> pokémon</p>
      <h4>Voici leurs cartes :</h4>
      <div class="row">
      <?php foreach ($query2 as $pokemon) : ?>
       <div class="col-12 col-md-4 col-sm-6 col-xs-12">
        <?= $this->element('Pokemons/card', ['pokemon' => $pokemon]); ?>
      </div>
      <?php endforeach; ?>
    </div>


    <h3>Les 10 premiers pokémon qui possède la plus grande vitesse</h3>

<div class="row">
    <?php foreach ($query3 as $pokemon_speed) : ?>
      <div class="col-12 col-md-4 col-sm-6 col-xs-12">
       <?= $this->element('Pokemons/card', ['pokemon' => $pokemon_speed]); ?>
     </div>
    <?php endforeach; ?>
   </div>
    </ul>
  </ul>
</div>
