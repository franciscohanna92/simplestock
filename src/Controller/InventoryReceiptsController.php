<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InventoryReceipts Controller
 *
 * @property \App\Model\Table\InventoryReceiptsTable $InventoryReceipts
 *
 * @method \App\Model\Entity\InventoryReceipt[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InventoryReceiptsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
$searchQuery = $this->request->getQuery('searchQuery');
        $pageTitle = 'Listado inventoryReceipts';
        $this->paginate = [
            'contain' => ['Providers', 'Companies']
        ];
        $inventoryReceipts = $this->paginate($this->InventoryReceipts);

        $this->set(compact('inventoryReceipts', 'pageTitle', 'searchQuery'));
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
$pageTitle = 'View inventoryReceipt';
$inventoryReceipt = $this->InventoryReceipts->get($id, [
'contain' => ['Providers', 'Companies', 'Articles']
]);

$this->set(compact('inventoryReceipt', 'pageTitle'));
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
$pageTitle = 'Add inventoryReceipt';
        $inventoryReceipt = $this->InventoryReceipts->newEntity();
        if ($this->request->is('post')) {
            $inventoryReceipt = $this->InventoryReceipts->patchEntity($inventoryReceipt, $this->request->getData());
            $inventoryReceipt['created_by'] = $this->Auth->user()['id'];
            $inventoryReceipt['company_id'] = $this->Auth->user()['company_id'];
            if ($this->InventoryReceipts->save($inventoryReceipt)) {
                $this->Flash->success(__('The inventory receipt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inventory receipt could not be saved. Please, try again.'));
        }
        $providers = $this->InventoryReceipts->Providers->find('list', ['limit' => 200]);
        $companies = $this->InventoryReceipts->Companies->find('list', ['limit' => 200]);
        $articles = $this->InventoryReceipts->Articles->find('list', ['limit' => 200]);
        $this->set(compact('inventoryReceipt', 'providers', 'companies', 'articles', 'pageTitle'));
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
$pageTitle = 'Edit inventoryReceipt';
        $inventoryReceipt = $this->InventoryReceipts->get($id, [
            'contain' => ['Articles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inventoryReceipt = $this->InventoryReceipts->patchEntity($inventoryReceipt, $this->request->getData());
            if ($this->InventoryReceipts->save($inventoryReceipt)) {
                $this->Flash->success(__('The inventory receipt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inventory receipt could not be saved. Please, try again.'));
        }
        $providers = $this->InventoryReceipts->Providers->find('list', ['limit' => 200]);
        $companies = $this->InventoryReceipts->Companies->find('list', ['limit' => 200]);
        $articles = $this->InventoryReceipts->Articles->find('list', ['limit' => 200]);
        $this->set(compact('inventoryReceipt', 'providers', 'companies', 'articles', 'pageTitle'));
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
        $inventoryReceipt = $this->InventoryReceipts->get($id);
        if ($this->InventoryReceipts->delete($inventoryReceipt)) {
            $this->Flash->success(__('The inventory receipt has been deleted.'));
        } else {
            $this->Flash->error(__('The inventory receipt could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
