<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * BuildingSites Controller
 *
 * @property \App\Model\Table\BuildingSitesTable $BuildingSites
 *
 * @method \App\Model\Entity\BuildingSite[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BuildingSitesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $searchQuery = $this->request->getQuery('searchQuery');
        $pageTitle = 'Obras';
        $this->paginate = [
            'contain' => ['Companies']
        ];
        $buildingSites = $this->paginate($this->BuildingSites);

        $this->set(compact('buildingSites', 'pageTitle', 'searchQuery'));
    }

    /**
     * View method
     *
     * @param string|null $id Building Site id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pageTitle = 'Detalle de obra';
        $buildingSite = $this->BuildingSites->get($id, [
            'contain' => ['Companies', 'InventoryIssues']
        ]);

        $this->set(compact('buildingSite', 'pageTitle'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pageTitle = 'Agregar obra';
        $buildingSite = $this->BuildingSites->newEntity();
        if ($this->request->is('post')) {
            $buildingSite = $this->BuildingSites->patchEntity($buildingSite, $this->request->getData());
            $buildingSite['created_by'] = $this->Auth->user()['id'];
            $buildingSite['company_id'] = $this->Auth->user()['company_id'];
            if ($this->BuildingSites->save($buildingSite)) {
                $this->Flash->success(__('La obra ha sido guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La obra no pudo ser guardad. Intentá nuevamente.'));
        }
        $companies = $this->BuildingSites->Companies->find('list', ['limit' => 200]);
        $this->set(compact('buildingSite', 'companies', 'pageTitle'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Building Site id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pageTitle = 'Editar obra';
        $buildingSite = $this->BuildingSites->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $buildingSite = $this->BuildingSites->patchEntity($buildingSite, $this->request->getData());
            if ($this->BuildingSites->save($buildingSite)) {
                $this->Flash->success(__('La obra ha sido guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La obra no pudo ser guardad. Intentá nuevamente.'));
        }
        $companies = $this->BuildingSites->Companies->find('list', ['limit' => 200]);
        $this->set(compact('buildingSite', 'companies', 'pageTitle'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Building Site id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $buildingSite = $this->BuildingSites->get($id);
        if ($this->BuildingSites->delete($buildingSite)) {
            $this->Flash->success(__('La obra ha sido eliminada.'));
        } else {
            $this->Flash->error(__('La obra no pudo ser eliminada. Intentá nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
