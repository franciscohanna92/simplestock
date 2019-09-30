<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PurchaseOrders Controller
 *
 * @property \App\Model\Table\PurchaseOrdersTable $PurchaseOrders
 *
 * @method \App\Model\Entity\PurchaseOrder[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchaseOrdersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
$searchQuery = $this->request->getQuery('searchQuery');
        $pageTitle = 'Listado purchaseOrders';
        $this->paginate = [
            'contain' => ['Providers', 'PurchaseOrdersStatuses', 'Companies']
        ];
        $purchaseOrders = $this->paginate($this->PurchaseOrders);

        $this->set(compact('purchaseOrders', 'pageTitle', 'searchQuery'));
    }

/**
* View method
*
* @param string|null $id Purchase Order id.
* @return \Cake\Http\Response|void
* @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
*/
public function view($id = null)
{
$pageTitle = 'View purchaseOrder';
$purchaseOrder = $this->PurchaseOrders->get($id, [
'contain' => ['Providers', 'PurchaseOrdersStatuses', 'Companies', 'Articles']
]);

$this->set(compact('purchaseOrder', 'pageTitle'));
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
$pageTitle = 'Add purchaseOrder';
        $purchaseOrder = $this->PurchaseOrders->newEntity();
        if ($this->request->is('post')) {
            $purchaseOrder = $this->PurchaseOrders->patchEntity($purchaseOrder, $this->request->getData());
            $purchaseOrder['created_by'] = $this->Auth->user()['id'];
            $purchaseOrder['company_id'] = $this->Auth->user()['company_id'];
            if ($this->PurchaseOrders->save($purchaseOrder)) {
                $this->Flash->success(__('El pedido ha sido guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase order could not be saved. Please, try again.'));
        }
        $providers = $this->PurchaseOrders->Providers->find('list', ['limit' => 200]);
        $purchaseOrdersStatuses = $this->PurchaseOrders->PurchaseOrdersStatuses->find('list', ['limit' => 200]);
        $companies = $this->PurchaseOrders->Companies->find('list', ['limit' => 200]);
        $articles = $this->PurchaseOrders->Articles->find('list', ['limit' => 200]);
        $this->set(compact('purchaseOrder', 'providers', 'purchaseOrdersStatuses', 'companies', 'articles', 'pageTitle'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchase Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
$pageTitle = 'Edit purchaseOrder';
        $purchaseOrder = $this->PurchaseOrders->get($id, [
            'contain' => ['Articles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchaseOrder = $this->PurchaseOrders->patchEntity($purchaseOrder, $this->request->getData());
            if ($this->PurchaseOrders->save($purchaseOrder)) {
                $this->Flash->success(__('El pedido ha sido guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase order could not be saved. Please, try again.'));
        }
        $providers = $this->PurchaseOrders->Providers->find('list', ['limit' => 200]);
        $purchaseOrdersStatuses = $this->PurchaseOrders->PurchaseOrdersStatuses->find('list', ['limit' => 200]);
        $companies = $this->PurchaseOrders->Companies->find('list', ['limit' => 200]);
        $articles = $this->PurchaseOrders->Articles->find('list', ['limit' => 200]);
        $this->set(compact('purchaseOrder', 'providers', 'purchaseOrdersStatuses', 'companies', 'articles', 'pageTitle'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Purchase Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchaseOrder = $this->PurchaseOrders->get($id);
        if ($this->PurchaseOrders->delete($purchaseOrder)) {
            $this->Flash->success(__('The purchase order has been deleted.'));
        } else {
            $this->Flash->error(__('The purchase order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
