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
    public function tableauDeBord($type)
    {
      $query1 = $this->Pokemons->find();
      $query1->where(['id > 386 AND id < 494'])->select(['PoidsMoyen' => $query1->func()->avg('weight')]);

      /* Première façon pas très opti car il y a un traitement à faire dans la tamplate tableau_de_bord avec 2 boucles foreach et un if
      $query2 = $this->Pokemons->find()
             ->where(['id > 1 AND id < 152 OR id > 251 AND id < 387 OR id > 721 AND id < 810']) //Pokémons des générations 1, 3 et 7
             ->contain(['PokemonTypes.Types']) //Jointure entre 2 tables
             ->extract('pokemon_types');
      */

      $query2 = $this->Pokemons->PokemonTypes->find()
        ->contain(['Types'])
        ->where(['Types.name' => "$type", '(pokemon_id > 0 AND pokemon_id < 152 OR pokemon_id > 251 AND pokemon_id < 387 OR pokemon_id > 721 AND pokemon_id < 810)']);

      $query2->select(['NombresPokemonsFée' => $query2->func()->count('name')]); //On compte le nombre de pokemons de type fée

      $query3 = $this->Pokemons->PokemonStats->find()
        ->contain(['Stats'])
        ->where(['Stats.name' => "speed"])
        ->order(['value' => 'DESC']);

      $query3->limit(10)->count();
      $query3->select(['pokemon_id', 'value']);

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
