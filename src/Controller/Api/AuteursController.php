<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * Auteurs Controller
 *
 * @property \App\Model\Table\AuteursTable $Auteurs
 */
class AuteursController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Auteurs->find();
        $auteurs = $this->paginate($query);

        $this->set(compact('auteurs'));
    }

    /**
     * View method
     *
     * @param string|null $id Auteur id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $auteur = $this->Auteurs->get($id, contain: ['LivreAuteur']);
        $this->set(compact('auteur'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $auteur = $this->Auteurs->newEmptyEntity();
        if ($this->request->is('post')) {
            $auteur = $this->Auteurs->patchEntity($auteur, $this->request->getData());
            if ($this->Auteurs->save($auteur)) {
                $this->Flash->success(__('The auteur has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The auteur could not be saved. Please, try again.'));
        }
        $this->set(compact('auteur'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Auteur id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $auteur = $this->Auteurs->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $auteur = $this->Auteurs->patchEntity($auteur, $this->request->getData());
            if ($this->Auteurs->save($auteur)) {
                $this->Flash->success(__('The auteur has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The auteur could not be saved. Please, try again.'));
        }
        $this->set(compact('auteur'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Auteur id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $auteur = $this->Auteurs->get($id);
        if ($this->Auteurs->delete($auteur)) {
            $this->Flash->success(__('The auteur has been deleted.'));
        } else {
            $this->Flash->error(__('The auteur could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
