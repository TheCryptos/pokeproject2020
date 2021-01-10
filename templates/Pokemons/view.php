<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pokemon $pokemon
 */
?>
<div class="content">
    <div class="column-responsive column-80">
            <h3 class="high_label"><?= h($pokemon->name) ?></h3>

            <table class ="spec">
              <th><?= $this->Form->postLink(__('Supprimer le pokémon'), ['action' => 'delete', $pokemon->id], ['confirm' => __('Etes-vous sûr que vous voulez supprimer # {0} ?', $pokemon->id), 'class' => 'warning']) ?></th>
              <th><?= $this->Html->link(__('Liste des pokémon'), ['action' => 'index'], ['class' => 'redirect']) ?></th>
            </table>


<?php if(!empty(h($pokemon->default_front_sprite_url)) OR !empty(h($pokemon->default_back_sprite_url)) OR !empty(h($pokemon->front_shiny_sprite_url))) : ?>

<div id="carousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php if(!empty(h($pokemon->default_front_sprite_url))) : ?>
    <li data-target="#carousel" data-slide-to="0"></li>
    <?php endif; ?>
    <?php if(!empty(h($pokemon->default_back_sprite_url))) : ?>
    <li data-target="#carousel" data-slide-to="1"></li>
    <?php endif; ?>
    <?php if(!empty(h($pokemon->front_shiny_sprite_url))) : ?>
    <li data-target="#carousel" data-slide-to="2"></li>
    <?php endif; ?>
  </ol>
  <div class="carousel-inner">
        <?php if(!empty(h($pokemon->default_front_sprite_url))) : ?>
    <div class="carousel-item active">
      <img class="d-block carousel" src="<?= h($pokemon->default_front_sprite_url) ?>" alt="Front Sprite">
      <div class="d-none d-md-block">
        <h1 class="label">Front Sprite</h1>
      </div>
    </div>
        <?php endif; ?>
        <?php if(!empty(h($pokemon->default_back_sprite_url))) : ?>
    <div class="carousel-item">
      <img class="d-block carousel" src="<?= h($pokemon->default_back_sprite_url) ?>" alt="Back Sprite">
      <div class="d-none d-md-block">
        <h1 class="label">Back Sprite</h1>
      </div>
    </div>
        <?php endif; ?>
        <?php if(!empty(h($pokemon->front_shiny_sprite_url))) : ?>
    <div class="carousel-item">
      <img class="d-block carousel" src="<?= h($pokemon->front_shiny_sprite_url) ?>" alt="Front Shiny">
      <div class="d-none d-md-block">
        <h1 class="label">Front Shiny</h1>
      </div>
    </div>
        <?php endif; ?>
  </div>
  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Précédant</span>
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Suivant</span>
  </a>
</div>
<?php else : ?>
  <img src="../../webroot/img/pokedex.Webp" alt="Pokémon image not found" style="display: grid;">
  <h3>Pokédex not found image &#128546;</h3>
<?php endif; ?>


      <table>
        <td><h3 class ="types"><?= $pokemon->first_type ?></h3></td>
        <td>
          <?php if ($pokemon->has_second_type) : ?>
          <h3 class ="types"><?= $pokemon->second_type ?></h3>
          <?php endif ?>
        </td>
      </table>

        <table class="spec">
          <tr>
            <th class="spec"> <h3>HP</h3> </th>
            <th class="spec"><h1><?= h($pokemon->Hp) ?></h1></th>
          </tr>
          <tr>
            <th class="spec"> <h3>Defense</h3> </th>
            <th class="spec"><h1><?= h($pokemon->Defense) ?></h1></th>
          </tr>
          <tr>
            <th class="spec"> <h3>Attack</h3> </th>
            <th class="spec"><h1><?= h($pokemon->Attack) ?></h1></th>
          </tr>
          <tr>
            <th class="spec"> <h3>Special Attack</h3> </th>
            <th class="spec"><h1><?= h($pokemon->SpeAttack) ?></h1></th>
          </tr>
          <tr>
            <th class="spec"> <h3>Special Defense</h3> </th>
            <th class="spec"><h1><?= h($pokemon->SpeDefense) ?></h1></th>
          </tr>
          <tr>
            <th class="spec"> <h3>Speed</h3> </th>
            <th class="spec"><h1><?= h($pokemon->Speed) ?></h1></th>
          </tr>
        </table>
      </div>
      <!--
        <div class="pokemons view content">
            <div class="related">
                <h4><?= __('Related Pokemon Stats') ?></h4>
                <?php if (!empty($pokemon->pokemon_stats)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Pokemon Id') ?></th>
                            <th><?= __('Stat Id') ?></th>
                            <th><?= __('Value') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pokemon->pokemon_stats as $pokemonStats) : ?>
                        <tr>
                            <td><?= h($pokemonStats->id) ?></td>
                            <td><?= h($pokemonStats->pokemon_id) ?></td>
                            <td><?= h($pokemonStats->stat_id) ?></td>
                            <td><?= h($pokemonStats->value) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PokemonStats', 'action' => 'view', $pokemonStats->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PokemonStats', 'action' => 'edit', $pokemonStats->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PokemonStats', 'action' => 'delete', $pokemonStats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemonStats->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Pokemon Types') ?></h4>
                <?php if (!empty($pokemon->pokemon_types)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Pokemon Id') ?></th>
                            <th><?= __('Type Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pokemon->pokemon_types as $pokemonTypes) : ?>
                        <tr>
                            <td><?= h($pokemonTypes->id) ?></td>
                            <td><?= h($pokemonTypes->pokemon_id) ?></td>
                            <td><?= h($pokemonTypes->type_id) ?></td>
                            <td><?= h($pokemonTypes->created) ?></td>
                            <td><?= h($pokemonTypes->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PokemonTypes', 'action' => 'view', $pokemonTypes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PokemonTypes', 'action' => 'edit', $pokemonTypes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PokemonTypes', 'action' => 'delete', $pokemonTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemonTypes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>-->
    </div>
</div>
