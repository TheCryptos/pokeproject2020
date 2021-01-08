<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pokemon $pokemon
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(__('Delete Pokemon'), ['action' => 'delete', $pokemon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemon->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pokemons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
      <div class="pokemons view content">
        <h3><?= h($pokemon->name) ?></h3>
        <div class="slider">
          <img src="<?= h($pokemon->default_front_sprite_url) ?>" alt="default_front_sprite">
          <img src="<?= h($pokemon->default_back_sprite_url) ?>" alt="default_back_sprite_url">
          <img src="<?= h($pokemon->front_shiny_sprite_url) ?>" alt="front_shiny_sprite_url">
        </div>

        <h3><?= $pokemon->first_type ?></h3>
        <?php if ($pokemon->has_second_type) : ?>
        <h3><?= $pokemon->second_type ?></h3>
        <?php endif ?>
        <table>
          <tr>
            <th> <h3>HP</h3> </th>
            <th><h1><?= h($pokemon->Hp) ?></h1></th>
          </tr>
          <tr>
            <th> <h3>Defense</h3> </th>
            <th><h1><?= h($pokemon->Defense) ?></h1></th>
          </tr>
          <tr>
            <th> <h3>Attack</h3> </th>
            <th><h1><?= h($pokemon->Attack) ?></h1></th>
          </tr>
          <tr>
            <th> <h3>Special Attack</h3> </th>
            <th><h1><?= h($pokemon->SpeAttack) ?></h1></th>
          </tr>
          <tr>
            <th> <h3>Special Defense</h3> </th>
            <th><h1><?= h($pokemon->SpeDefense) ?></h1></th>
          </tr>
          <tr>
            <th> <h3>Speed</h3> </th>
            <th><h1><?= h($pokemon->Speed) ?></h1></th>
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
