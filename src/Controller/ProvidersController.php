<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Providers Controller
 *
 * @property \App\Model\Table\ProvidersTable $Providers
 *
 * @method \App\Model\Entity\Provider[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProvidersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $searchQuery = $this->request->getQuery('searchQuery');
        $pageTitle = 'Proveedores';
        $this->paginate = [
            'contain' => ['Cities', 'Companies']
        ];
        $providers = $this->paginate($this->Providers->find()->where([
            'OR' => [
                'Providers.name LIKE' => '%' . $searchQuery . '%',
                'Providers.email LIKE' => '%' . $searchQuery . '%',
                'Providers.phone LIKE' => '%' . $searchQuery . '%',
                'Providers.cuit LIKE' => '%' . $searchQuery . '%',
            ]
        ]));

        $this->set(compact('providers', 'pageTitle', 'searchQuery'));
    }

    /**
     * View method
     *
     * @param string|null $id Provider id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $provider = $this->Providers->get($id, [
            'contain' => ['Cities', 'Companies']
        ]);

        $pageTitle = $provider['name'];

        $this->set(compact('provider', 'pageTitle'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pageTitle = 'Agregar proveedor';
        $provider = $this->Providers->newEntity();
        if ($this->request->is('post')) {
            $provider = $this->Providers->patchEntity($provider, $this->request->getData());
            $provider['created_by'] = $this->Auth->user()['id'];
            $provider['company_id'] = $this->Auth->user()['company_id'];
            if ($this->Providers->save($provider)) {
                $this->Flash->success(__('El proveedor ha sido guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provider could not be saved. Please, try again.'));
        }
        $cities = $this->Providers->Cities->find('list', ['limit' => 200]);
        $this->set(compact('provider', 'cities', 'companies', 'provinces', 'pageTitle'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Provider id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pageTitle = 'Editar proveedor';
        $provider = $this->Providers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $provider = $this->Providers->patchEntity($provider, $this->request->getData());
            if ($this->Providers->save($provider)) {
                $this->Flash->success(__('El proveedor ha sido guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provider could not be saved. Please, try again.'));
        }
        $cities = $this->Providers->Cities->find('list', ['limit' => 200]);
        $this->set(compact('provider', 'cities', 'companies', 'provinces', 'pageTitle'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Provider id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $provider = $this->Providers->get($id);
        if ($this->Providers->delete($provider)) {
            $this->Flash->success(__('The provider has been deleted.'));
        } else {
            $this->Flash->error(__('The provider could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
