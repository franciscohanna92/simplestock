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
        $pageTitle = 'Listado articles';
        $this->paginate = [
            'contain' => ['Categories', 'Providers', 'Companies']
        ];
        $articles = $this->paginate($this->Articles);

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
$pageTitle = 'Add article';
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
        $providers = $this->Articles->Providers->find('list', ['limit' => 200]);
        $companies = $this->Articles->Companies->find('list', ['limit' => 200]);
        $inventoryIssues = $this->Articles->InventoryIssues->find('list', ['limit' => 200]);
        $inventoryReceipts = $this->Articles->InventoryReceipts->find('list', ['limit' => 200]);
        $purchaseOrders = $this->Articles->PurchaseOrders->find('list', ['limit' => 200]);
        $this->set(compact('article', 'categories', 'providers', 'companies', 'inventoryIssues', 'inventoryReceipts', 'purchaseOrders', 'pageTitle'));
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
$pageTitle = 'Edit article';
        $article = $this->Articles->get($id, [
            'contain' => ['InventoryIssues', 'InventoryReceipts', 'PurchaseOrders']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
        $providers = $this->Articles->Providers->find('list', ['limit' => 200]);
        $companies = $this->Articles->Companies->find('list', ['limit' => 200]);
        $inventoryIssues = $this->Articles->InventoryIssues->find('list', ['limit' => 200]);
        $inventoryReceipts = $this->Articles->InventoryReceipts->find('list', ['limit' => 200]);
        $purchaseOrders = $this->Articles->PurchaseOrders->find('list', ['limit' => 200]);
        $this->set(compact('article', 'categories', 'providers', 'companies', 'inventoryIssues', 'inventoryReceipts', 'purchaseOrders', 'pageTitle'));
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
