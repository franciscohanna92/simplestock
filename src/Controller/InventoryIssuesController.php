<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * InventoryIssues Controller
 *
 * @property \App\Model\Table\InventoryIssuesTable $InventoryIssues
 *
 * @method \App\Model\Entity\InventoryIssue[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InventoryIssuesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $searchQuery = $this->request->getQuery('searchQuery');
        $pageTitle = 'Salidas';
        $this->paginate = [
            'contain' => ['Companies', 'BuildingSites', 'Employees']
        ];
        $inventoryIssues = $this->paginate($this->InventoryIssues->find()->where([
            'OR' => [
                'InventoryIssues.descriptive_name LIKE' => '%' . $searchQuery . '%',
                'BuildingSites.name LIKE' => '%' . $searchQuery . '%',
                'Employees.name LIKE' => '%' . $searchQuery . '%',
                'Employees.lastname LIKE' => '%' . $searchQuery . '%',
            ]
        ]));
        $this->set(compact('inventoryIssues', 'pageTitle', 'searchQuery'));
    }

    /**
     * View method
     *
     * @param string|null $id Inventory Receipt id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pageTitle = 'Detalle de salida';
        $inventoryIssue = $this->InventoryIssues->get($id, [
            'contain' => [
                'Companies',
                'Articles' => ['Categories'],
                'BuildingSites',
                'Employees'
            ]
        ]);


        $this->set(compact('inventoryIssue', 'pageTitle'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pageTitle = 'Registrar nueva salida';
        $inventoryIssue = $this->InventoryIssues->newEntity();
        if ($this->request->is('post')) {
            $inventoryIssue = $this->InventoryIssues->patchEntity($inventoryIssue, $this->request->getData());
            $inventoryIssue['created_by'] = $this->Auth->user()['id'];
            $inventoryIssue['company_id'] = $this->Auth->user()['company_id'];

            foreach ($inventoryIssue['articles'] as $article) {
                $article['stock'] -= $article->_joinData['quantity'];
            }

            if ($this->InventoryIssues->save($inventoryIssue)) {
                $this->Flash->success(__('La salida ha sido guardada.'));


                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inventory receipt could not be saved. Please, try again.'));
        }
        $articles = $this->InventoryIssues->Articles->find('all')->contain(['Units', 'Categories'])->toArray();
        $employees = $this->InventoryIssues->Employees->find('list');
        $buildingSites = $this->InventoryIssues->BuildingSites->find('list');
        $this->set(compact('inventoryIssue', 'companies', 'employees', 'buildingSites', 'articles', 'pageTitle'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Inventory Receipt id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pageTitle = 'Edit inventoryIssue';
        $inventoryIssue = $this->InventoryIssues->get($id, [
            'contain' => ['Articles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inventoryIssue = $this->InventoryIssues->patchEntity($inventoryIssue, $this->request->getData());
            if ($this->InventoryIssues->save($inventoryIssue)) {
                $this->Flash->success(__('La salida ha sido guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inventory receipt could not be saved. Please, try again.'));
        }
        $articles = $this->InventoryIssues->Articles->find('list');
        $this->set(compact('inventoryIssue', 'companies', 'articles', 'pageTitle'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Inventory Receipt id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inventoryIssue = $this->InventoryIssues->get($id, [
            'contain' => [
                'Articles'
            ]
        ]);

        foreach ($inventoryIssue->articles as $article) {
            $existingArticle = $this->InventoryIssues->Articles->get($article['id']);
            $existingArticle->stock = $existingArticle->stock + $article['_joinData']['quantity'];
            $this->InventoryIssues->Articles->save($existingArticle);
        }

        if ($this->InventoryIssues->delete($inventoryIssue)) {
            $this->Flash->success(__('The inventory receipt has been deleted.'));
        } else {
            $this->Flash->error(__('The inventory receipt could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
