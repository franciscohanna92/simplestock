<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public $roles = [
        "DEPOSITO" => "Encargado de depósito",
        "COMPRAS" => "Encargado de compras",
        "TECNICA" => "Encargado de área técnica",
        "ARTICULOS" => "Venta de artículos",
        "ADMIN" => "Administrador",
    ];

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $searchQuery = $this->request->getQuery('searchQuery');
        $pageTitle = 'Usuarios';
        $this->paginate = [
            'contain' => ['Companies']
        ];
        $users = $this->paginate($this->Users->find()->where([
            'OR' => [
                'Users.email LIKE' => '%' . $searchQuery . '%',
            ]
        ]));
        $roles = $this->roles;
        $this->set(compact('users', 'roles', 'pageTitle', 'searchQuery'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pageTitle = 'View user';
        $user = $this->Users->get($id, [
            'contain' => ['Companies']
        ]);
        $roles = $this->roles;
        $this->set(compact('user', 'roles', 'pageTitle'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pageTitle = 'Add user';
        $user = $this->Users->newEntity();
        $user->company_id = 1;
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user['company_id'] = $this->Auth->user()['company_id'];
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El usuario ha sido guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->roles;
        $this->set(compact('user', 'roles', 'pageTitle'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pageTitle = 'Editar usuario';
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            if (empty($data['password'])) {
                unset($data['password']);
            }
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {

                if ($user['id'] == $this->Auth->user('id')) {
                    $this->Auth->setUser($user);
                }

                $this->Flash->success(__('El usuario ha sido guardado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El usuario no pudo ser guardado. Intentá de nuevo.'));
        }
        $roles = $this->roles;

        $this->set(compact('user', 'roles', 'pageTitle'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /**
     * @return \Cake\Http\Response|null
     */
    public function login()
    {
        $pageTitle = 'Iniciar sesión';
        $this->viewBuilder()->setLayout('auth');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                if (in_array($user['role'], ['ADMIN', 'DEPOSITO', 'COMPRAS', 'ARTICULOS'])) {
                    return $this->redirect('/');
                }
                return $this->redirect('/reports');
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
        $this->set(compact('pageTitle'));
    }

    /**
     * @return \Cake\Http\Response|null
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
