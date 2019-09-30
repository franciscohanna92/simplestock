<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $searchQuery = $this->request->getQuery('searchQuery');
        $pageTitle = 'Artículos';
        $this->paginate = [
            'contain' => ['Categories', 'Providers', 'Companies', 'Units']
        ];
        $articles = $this->paginate($this->Articles->find()->where([
            'OR' => [
                'Articles.name LIKE' => '%' . $searchQuery . '%',
                'Articles.internal_code LIKE' => '%' . $searchQuery . '%',
                'Articles.provider_code LIKE' => '%' . $searchQuery . '%',
            ]
        ]));

        $this->set(compact('articles', 'pageTitle', 'searchQuery'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pageTitle = 'View article';
        $article = $this->Articles->get($id, [
            'contain' => ['Categories', 'Providers', 'Companies', 'InventoryIssues', 'InventoryReceipts', 'PurchaseOrders']
        ]);

        $this->set(compact('article', 'pageTitle'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pageTitle = 'Agregar artículo';
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            $article['created_by'] = $this->Auth->user()['id'];
            $article['company_id'] = $this->Auth->user()['company_id'];
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('El artículo ha sido guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $categories = $this->Articles->Categories->find('list');
        $units = $this->Articles->Units->find('list');
        $providers = $this->Articles->Providers->find('list');
        $companies = $this->Articles->Companies->find('list');
        $this->set(compact('article', 'categories', 'providers', 'companies', 'units', 'pageTitle'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pageTitle = 'Editar artículo';
        $article = $this->Articles->get($id, [
            'contain' => ['InventoryIssues', 'InventoryReceipts', 'PurchaseOrders']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('El artículo ha sido guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $categories = $this->Articles->Categories->find('list');
        $providers = $this->Articles->Providers->find('list');
        $companies = $this->Articles->Companies->find('list');
        $units = $this->Articles->Units->find('list');
        $this->set(compact('article', 'categories', 'providers', 'companies', 'units', 'pageTitle'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
