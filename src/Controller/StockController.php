<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Stock Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Stock[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StockController extends AppController
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

        $lowStockOnly = $this->request->getQuery('lowStockOnly');

        if($lowStockOnly) {
            $articles = $this->paginate($this->Articles->find('all', [
                'contain' => ['Categories', 'Providers', 'Companies', 'Units']
            ])->where([
                'Articles.stock < Articles.security_stock',
                'Articles.name LIKE' => '%' . $searchQuery . '%'
            ]));
        } else {
            $articles = $this->paginate($this->Articles->find('all', [
                'contain' => ['Categories', 'Providers', 'Companies', 'Units']
            ])->where([
                'Articles.name LIKE' => '%' . $searchQuery . '%'
            ]));
        }

        $this->set(compact('pageTitle', 'articles', 'lowStockOnly','searchQuery'));
    }
}
