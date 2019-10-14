<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Chronos\Date;

/**
 * Reports Controller
 *
 * @property \App\Model\Table\ReportsTable $Reports
 *  * @property \App\Model\Table\InventoryIssuesTable $InventoryIssues
 *  * @property \App\Model\Table\InventoryReceiptsTable $InventoryReceipts
 *
 *
 * @method \App\Model\Entity\Report[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $searchQuery = $this->request->getQuery('searchQuery');
        $pageTitle = 'Informes';
        $this->paginate = [
            'contain' => ['Companies']
        ];
        $reports = $this->paginate($this->Reports);

        $this->set(compact('reports', 'pageTitle', 'searchQuery'));
    }

    /**
     * View method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $report = $this->Reports->get($id, [
            'contain' => ['Companies']
        ]);

        $dateFrom = $report->date_from;
        $dateTo = $report->date_to;

        switch ($report->type) {
            case 'Salidas':
                $pageTitle = 'Informe de salidas';
                $this->loadModel('InventoryIssues');
                $reportData = $this->InventoryIssues->find()
                    ->contain(['Articles'])
                    ->where([
                        'AND' => [
                            'InventoryIssues.date >=' => $dateFrom,
                            'InventoryIssues.date <=' => $dateTo ? $dateTo : new Date(),
                        ]
                    ])
                    ->toArray();
                break;
            case 'Entradas':
                $pageTitle = 'Informe de entradas';
                $this->loadModel('InventoryReceipts');
                $reportData = $this->InventoryReceipts->find()
                    ->contain(['Articles'])
                    ->where([
                        'AND' => [
                            'InventoryReceipts.date >=' => $dateFrom,
                            'InventoryReceipts.date <=' => $dateTo ? $dateTo : new Date(),
                        ]
                    ])
                    ->toArray();
                break;
        }

        $this->set(compact('report', 'reportData'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pageTitle = 'Nuevo informe';
        $report = $this->Reports->newEntity();
        if ($this->request->is('post')) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            $report['created_by'] = $this->Auth->user()['id'];
            $report['company_id'] = $this->Auth->user()['company_id'];
            if ($this->Reports->save($report)) {
                return $this->redirect(['action' => 'view', $report->id]);
            }
            $this->Flash->error(__('El informe no pudo ser generador. Intente nuevamente.'));
        }
        $companies = $this->Reports->Companies->find('list', ['limit' => 200]);
        $this->set(compact('report', 'companies', 'pageTitle'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $report = $this->Reports->get($id);
        if ($this->Reports->delete($report)) {
            $this->Flash->success(__('El informe ha sido eliminado'));
        } else {
            $this->Flash->error(__('El informe no pudo ser eliminado. Intente nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
