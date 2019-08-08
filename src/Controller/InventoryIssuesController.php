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
        $pageTitle = 'Listado inventoryIssues';
        $this->paginate = [
            'contain' => ['Employees', 'BuildingSites', 'Companies']
        ];
        $inventoryIssues = $this->paginate($this->InventoryIssues);

        $this->set(compact('inventoryIssues', 'pageTitle', 'searchQuery'));
    }

/**
* View method
*
* @param string|null $id Inventory Issue id.
* @return \Cake\Http\Response|void
* @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
*/
public function view($id = null)
{
$pageTitle = 'View inventoryIssue';
$inventoryIssue = $this->InventoryIssues->get($id, [
'contain' => ['Employees', 'BuildingSites', 'Companies', 'Articles']
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
$pageTitle = 'Add inventoryIssue';
        $inventoryIssue = $this->InventoryIssues->newEntity();
        if ($this->request->is('post')) {
            $inventoryIssue = $this->InventoryIssues->patchEntity($inventoryIssue, $this->request->getData());
            $inventoryIssue['created_by'] = $this->Auth->user()['id'];
            $inventoryIssue['company_id'] = $this->Auth->user()['company_id'];
            if ($this->InventoryIssues->save($inventoryIssue)) {
                $this->Flash->success(__('The inventory issue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inventory issue could not be saved. Please, try again.'));
        }
        $employees = $this->InventoryIssues->Employees->find('list', ['limit' => 200]);
        $buildingSites = $this->InventoryIssues->BuildingSites->find('list', ['limit' => 200]);
        $companies = $this->InventoryIssues->Companies->find('list', ['limit' => 200]);
        $articles = $this->InventoryIssues->Articles->find('list', ['limit' => 200]);
        $this->set(compact('inventoryIssue', 'employees', 'buildingSites', 'companies', 'articles', 'pageTitle'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Inventory Issue id.
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
                $this->Flash->success(__('The inventory issue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inventory issue could not be saved. Please, try again.'));
        }
        $employees = $this->InventoryIssues->Employees->find('list', ['limit' => 200]);
        $buildingSites = $this->InventoryIssues->BuildingSites->find('list', ['limit' => 200]);
        $companies = $this->InventoryIssues->Companies->find('list', ['limit' => 200]);
        $articles = $this->InventoryIssues->Articles->find('list', ['limit' => 200]);
        $this->set(compact('inventoryIssue', 'employees', 'buildingSites', 'companies', 'articles', 'pageTitle'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Inventory Issue id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inventoryIssue = $this->InventoryIssues->get($id);
        if ($this->InventoryIssues->delete($inventoryIssue)) {
            $this->Flash->success(__('The inventory issue has been deleted.'));
        } else {
            $this->Flash->error(__('The inventory issue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
