<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Pokemons Controller
 *
 * @property \App\Model\Table\PokemonsTable $Pokemons
 * @method \App\Model\Entity\Pokemon[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PokemonsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'limit' => 30,
        ];

        $pokemons = $this->Pokemons->find('all')->contain(['PokemonStats.Stats', 'PokemonTypes.Types']);
        $pokemons = $this->paginate($pokemons);

        $this->set(compact('pokemons'));
    }

    /**
     * tableauDeBord method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function tableauDeBord($type = 'fairy')
    {
      $query1 = $this->Pokemons->find();
      $query1->where(['id > 386 AND id < 494'])->select(['PoidsMoyen' => $query1->func()->avg('weight')]);

      $query2 = $this->Pokemons->find()
          ->contain(['PokemonStats.Stats', 'PokemonTypes.Types'])
          ->from('pokemons AS Pokemons, pokemon_types, types')
          ->where(['types.name' => $type, '(pokemon_id > 0 AND pokemon_id < 152 OR pokemon_id > 251 AND pokemon_id < 387 OR pokemon_id > 721 AND pokemon_id < 810)'])
          ->where(['types.id = pokemon_types.type_id'])
          ->where(['pokemon_types.pokemon_id = Pokemons.id']);

      $query3 = $this->Pokemons->find()
          ->contain(['PokemonStats.Stats', 'PokemonTypes.Types'])
          ->from('pokemons AS Pokemons, pokemon_stats')
          ->where(['pokemon_stats.stat_id = 6'])
          ->where(['pokemon_stats.pokemon_id = Pokemons.id'])
          ->order(['pokemon_stats.value' => 'DESC'])
          ->limit(10);

      $this->set(compact('query1', 'query2', 'query3'));
    }

    /**
     * View method
     *
     * @param string|null $id Pokemon id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pokemon = $this->Pokemons->get($id, [
            'contain' => ['PokemonStats.Stats', 'PokemonTypes.Types'],
        ]);

        $this->set(compact('pokemon'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pokemon id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pokemon = $this->Pokemons->get($id);
        if ($this->Pokemons->delete($pokemon)) {
            $this->Flash->success(__('Le pokemon a été supprimé.'));
        } else {
            $this->Flash->error(__("Le pokémon n'a pas pu être supprimé. Veuillez réessayer.."));
        }

        return $this->redirect(['action' => 'index']);
    }
}
