<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pokemon[]|\Cake\Collection\CollectionInterface $pokemons
 */
?>

<div class="content">
    <h3 class="high_label"><?= __('Liste des pokémon') ?></h3>

    <div class="row">
        <?php foreach ($pokemons as $pokemon) : ?>
                <div class="col-12 col-md-4 col-sm-6 col-xs-12">
                    <?= $this->element('Pokemons/card', ['pokemon' => $pokemon]); ?>
                </div>
        <?php endforeach; ?>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('premier')) ?>
            <?= $this->Paginator->prev('< ' . __('précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
            <?= $this->Paginator->last(__('dernier') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}, montrant {{current}} enregistrement(s) sur un total de {{count}}')) ?></p>
    </div>
</div>
