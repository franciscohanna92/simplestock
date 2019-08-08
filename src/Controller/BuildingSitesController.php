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
        $pageTitle = 'Listado buildingSites';
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
$pageTitle = 'View buildingSite';
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
$pageTitle = 'Add buildingSite';
        $buildingSite = $this->BuildingSites->newEntity();
        if ($this->request->is('post')) {
            $buildingSite = $this->BuildingSites->patchEntity($buildingSite, $this->request->getData());
            $buildingSite['created_by'] = $this->Auth->user()['id'];
            $buildingSite['company_id'] = $this->Auth->user()['company_id'];
            if ($this->BuildingSites->save($buildingSite)) {
                $this->Flash->success(__('The building site has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The building site could not be saved. Please, try again.'));
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
$pageTitle = 'Edit buildingSite';
        $buildingSite = $this->BuildingSites->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $buildingSite = $this->BuildingSites->patchEntity($buildingSite, $this->request->getData());
            if ($this->BuildingSites->save($buildingSite)) {
                $this->Flash->success(__('The building site has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The building site could not be saved. Please, try again.'));
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
            $this->Flash->success(__('The building site has been deleted.'));
        } else {
            $this->Flash->error(__('The building site could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
