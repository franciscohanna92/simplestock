<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * Roles component
 */
class RolesComponent extends Component
{

    public $components = ['Auth'];

    public $permissions = [
        'ADMIN' => [
            'read' => ['Stock', 'Articles', 'BuildingSites', 'Categories', 'Clients', 'Dashboard', 'Employees', 'InventoryIssues', 'InventoryReceipts', 'Providers', 'Reports', 'Stock', 'Users'],
            'write' => []
        ],
        'DEPOSITO' => [
            'read' => ['Stock', 'Articles', 'BuildingSites', 'Categories', 'Clients', 'Dashboard', 'Employees', 'InventoryIssues', 'InventoryReceipts', 'Providers', 'Reports', 'Stock', 'Users'],
            'write' => ['Stock', 'Articles', 'BuildingSites', 'Categories', 'Clients', 'Dashboard', 'Employees', 'InventoryIssues', 'InventoryReceipts', 'Providers', 'Reports', 'Stock', 'Users']
        ],
        'COMPRAS' => [
            'read' => ['Articles', 'BuildingSites', 'Clients', 'InventoryIssues', 'InventoryReceipts', 'Providers', 'Stock'],
            'write' => ['Clients', 'Providers', 'Stock']
        ],
        'TECNICA' => [
            'read' => ['Articles', 'Reports'],
            'write' => ['Reports']
        ],
        'ARTICULOS' => [
            'read' => ['Stock', 'Articles', 'Clients', 'InventoryIssues', 'InventoryReceipts', 'Providers'],
            'write' => ['Stock', 'Articles', 'Clients', 'InventoryIssues', 'InventoryReceipts', 'Providers'],
        ]
    ];

    public function check()
    {
        $role = $this->Auth->user()['role'];
        $action = $this->request->getParam('action');
        $controller = $this->request->getParam('controller');
        $permissions = $this->permissions[$role];

        if (in_array($action, ['index', 'view'])) {
            return in_array($controller, $permissions['read']);
        }

        if (in_array($action, ['add', 'edit', 'delete'])) {
            return in_array($controller, $permissions['write']);
        }
    }
}
