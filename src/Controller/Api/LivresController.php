<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * Livres Controller
 *
 * @property \App\Model\Table\LivresTable $Livres
 */
class LivresController extends AppController
{
    /**
     * Liste method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function liste()
    {
        $livres = $this->Livres->find();

        $this->set(compact('livres'));
        $this->viewBuilder()->setOption('serialize', 'livres');
    }

    /**
     * View method
     *
     * @param string|null $id Livre id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $livre = $this->Livres->get($id, contain: ['LivreAuteur']);
        $this->set(compact('livre'));
        $this->viewBuilder()->setOption('serialize', 'livre');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $livre = $this->Livres->newEmptyEntity();
        if ($this->request->is('post')) {
            $livre = $this->Livres->patchEntity($livre, $this->request->getData());
            if ($this->Livres->save($livre)) {
                $this->Flash->success(__('The livre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The livre could not be saved. Please, try again.'));
        }
        $this->set(compact('livre'));
        $this->viewBuilder()->setOption('serialize', 'livre');
    }

    /**
     * Edit method
     *
     * @param string|null $id Livre id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $livre = $this->Livres->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livre = $this->Livres->patchEntity($livre, $this->request->getData());
            if ($this->Livres->save($livre)) {
                $this->Flash->success(__('The livre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The livre could not be saved. Please, try again.'));
        }
        $this->set(compact('livre'));
        $this->viewBuilder()->setOption('serialize', 'livre');
    }

    /**
     * Delete method
     *
     * @param string|null $id Livre id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $livre = $this->Livres->get($id);
        if ($this->Livres->delete($livre)) {
            $this->Flash->success(__('The livre has been deleted.'));
        } else {
            $this->Flash->error(__('The livre could not be deleted. Please, try again.'));
        }

        $this->viewBuilder()->setOption('serialize', 'livre');
    }
}
