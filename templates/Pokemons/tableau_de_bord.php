<div class="content">
  <ul>
    <h3>Poids moyen des pokémon de la 4ème génération</h3>
    <p>Résultat = <?= h($query1->first()->PoidsMoyen) ?></p>

      <h3>Nombre de pokémon de type fée entre les générations 1,3 et 7</h3>
      <p>Résultat = <?= h($query2->count()) ?> pokémon</p>
      <h4>Voici leurs cartes :</h4>
      <?php foreach ($query2 as $pokemon) : ?>
        <?= $this->element('Pokemons/card', ['pokemon' => $pokemon]); ?>
      <?php endforeach; ?>


    <h3>Les 10 premiers pokemons qui possède la plus grande vitesse</h3>
    <ul>
    <?php foreach ($query3 as $pokemon_speed) : ?>
      <?= $this->element('Pokemons/card', ['pokemon' => $pokemon_speed]); ?>
    <?php endforeach; ?>
    </ul>
  </ul>
</div>
