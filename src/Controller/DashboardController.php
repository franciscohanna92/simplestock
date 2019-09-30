<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Dashboard Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Dashboard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashboardController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Articles');
        $searchQuery = $this->request->getQuery('searchQuery');
        $pageTitle = 'Stock';

        $articles = $this->paginate($this->Articles->find('all', [
            'contain' => ['Categories', 'Providers', 'Companies', 'Units']
        ]));

        $this->set(compact('pageTitle', 'articles', 'searchQuery'));
    }
}
