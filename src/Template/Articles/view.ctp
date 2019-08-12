<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>

<div class="card">
    <div class="card-body">
                <table class="vertical-table">
                                                                        <tr>
                            <th scope="row"><?= __('Name') ?></th>
                            <td><?= h($article->name) ?></td>
                        </tr>
                                                                                <tr>
                            <th scope="row"><?= __('Description') ?></th>
                            <td><?= h($article->description) ?></td>
                        </tr>
                                                                                <tr>
                            <th scope="row"><?= __('Internal Code') ?></th>
                            <td><?= h($article->internal_code) ?></td>
                        </tr>
                                                                                <tr>
                            <th scope="row"><?= __('Provider Code') ?></th>
                            <td><?= h($article->provider_code) ?></td>
                        </tr>
                                                                                                        <tr>
                            <th scope="row"><?= __('Category') ?></th>
                            <td><?= $article->has('category') ? $this->Html->link($article
                                ->category->name, ['controller' =>
                                'Categories', 'action' => 'view', $article->category
                                ->id]) : '' ?>
                            </td>
                        </tr>
                                                                                                        <tr>
                            <th scope="row"><?= __('Provider') ?></th>
                            <td><?= $article->has('provider') ? $this->Html->link($article
                                ->provider->name, ['controller' =>
                                'Providers', 'action' => 'view', $article->provider
                                ->id]) : '' ?>
                            </td>
                        </tr>
                                                                                                        <tr>
                            <th scope="row"><?= __('Company') ?></th>
                            <td><?= $article->has('company') ? $this->Html->link($article
                                ->company->name, ['controller' =>
                                'Companies', 'action' => 'view', $article->company
                                ->id]) : '' ?>
                            </td>
                        </tr>
                                                                                                            <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($article->id) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Security Stock') ?></th>
                        <td><?= $this->Number->format($article->security_stock) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Stock') ?></th>
                        <td><?= $this->Number->format($article->stock) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Created By') ?></th>
                        <td><?= $this->Number->format($article->created_by) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Updated By') ?></th>
                        <td><?= $this->Number->format($article->updated_by) ?></td>
                    </tr>
                                                                            <tr>
                        <th scope="row"><?= __('Created At') ?></th>
                        <td><?= h($article->created_at) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Updated At') ?></th>
                        <td><?= h($article->updated_at) ?></td>
                    </tr>
                                                </table>
                                                            <div class="related">
                <h4><?= __('Related Inventory Issues') ?></h4>
                <?php if (!empty($article->inventory_issues)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                                                    <th scope="col"><?= __('Id') ?></th>
                                                    <th scope="col"><?= __('Date') ?></th>
                                                    <th scope="col"><?= __('Employee Id') ?></th>
                                                    <th scope="col"><?= __('Building Site Id') ?></th>
                                                    <th scope="col"><?= __('Company Id') ?></th>
                                                    <th scope="col"><?= __('Created At') ?></th>
                                                    <th scope="col"><?= __('Created By') ?></th>
                                                    <th scope="col"><?= __('Updated At') ?></th>
                                                    <th scope="col"><?= __('Updated By') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($article->inventory_issues as $inventoryIssues): ?>
                    <tr>
                                                    <td><?= h($inventoryIssues->id) ?></td>
                                                    <td><?= h($inventoryIssues->date) ?></td>
                                                    <td><?= h($inventoryIssues->employee_id) ?></td>
                                                    <td><?= h($inventoryIssues->building_site_id) ?></td>
                                                    <td><?= h($inventoryIssues->company_id) ?></td>
                                                    <td><?= h($inventoryIssues->created_at) ?></td>
                                                    <td><?= h($inventoryIssues->created_by) ?></td>
                                                    <td><?= h($inventoryIssues->updated_at) ?></td>
                                                    <td><?= h($inventoryIssues->updated_by) ?></td>
                                                                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'InventoryIssues', 'action' =>
                            'view', $inventoryIssues->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'InventoryIssues', 'action' =>
                            'edit', $inventoryIssues->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'InventoryIssues', 'action' =>
                            'delete', $inventoryIssues->id], ['confirm' => __('Are you sure you want to delete #
                            {0}?', $inventoryIssues->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
                                            <div class="related">
                <h4><?= __('Related Inventory Receipts') ?></h4>
                <?php if (!empty($article->inventory_receipts)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                                                    <th scope="col"><?= __('Id') ?></th>
                                                    <th scope="col"><?= __('Date') ?></th>
                                                    <th scope="col"><?= __('Number') ?></th>
                                                    <th scope="col"><?= __('Providers Id') ?></th>
                                                    <th scope="col"><?= __('Company Id') ?></th>
                                                    <th scope="col"><?= __('Created At') ?></th>
                                                    <th scope="col"><?= __('Created By') ?></th>
                                                    <th scope="col"><?= __('Updated At') ?></th>
                                                    <th scope="col"><?= __('Updated By') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($article->inventory_receipts as $inventoryReceipts): ?>
                    <tr>
                                                    <td><?= h($inventoryReceipts->id) ?></td>
                                                    <td><?= h($inventoryReceipts->date) ?></td>
                                                    <td><?= h($inventoryReceipts->number) ?></td>
                                                    <td><?= h($inventoryReceipts->providers_id) ?></td>
                                                    <td><?= h($inventoryReceipts->company_id) ?></td>
                                                    <td><?= h($inventoryReceipts->created_at) ?></td>
                                                    <td><?= h($inventoryReceipts->created_by) ?></td>
                                                    <td><?= h($inventoryReceipts->updated_at) ?></td>
                                                    <td><?= h($inventoryReceipts->updated_by) ?></td>
                                                                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'InventoryReceipts', 'action' =>
                            'view', $inventoryReceipts->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'InventoryReceipts', 'action' =>
                            'edit', $inventoryReceipts->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'InventoryReceipts', 'action' =>
                            'delete', $inventoryReceipts->id], ['confirm' => __('Are you sure you want to delete #
                            {0}?', $inventoryReceipts->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
                                            <div class="related">
                <h4><?= __('Related Purchase Orders') ?></h4>
                <?php if (!empty($article->purchase_orders)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                                                    <th scope="col"><?= __('Id') ?></th>
                                                    <th scope="col"><?= __('Date') ?></th>
                                                    <th scope="col"><?= __('Observations') ?></th>
                                                    <th scope="col"><?= __('Provider Id') ?></th>
                                                    <th scope="col"><?= __('Status Id') ?></th>
                                                    <th scope="col"><?= __('Company Id') ?></th>
                                                    <th scope="col"><?= __('Created At') ?></th>
                                                    <th scope="col"><?= __('Created By') ?></th>
                                                    <th scope="col"><?= __('Updated At') ?></th>
                                                    <th scope="col"><?= __('Updated By') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($article->purchase_orders as $purchaseOrders): ?>
                    <tr>
                                                    <td><?= h($purchaseOrders->id) ?></td>
                                                    <td><?= h($purchaseOrders->date) ?></td>
                                                    <td><?= h($purchaseOrders->observations) ?></td>
                                                    <td><?= h($purchaseOrders->provider_id) ?></td>
                                                    <td><?= h($purchaseOrders->status_id) ?></td>
                                                    <td><?= h($purchaseOrders->company_id) ?></td>
                                                    <td><?= h($purchaseOrders->created_at) ?></td>
                                                    <td><?= h($purchaseOrders->created_by) ?></td>
                                                    <td><?= h($purchaseOrders->updated_at) ?></td>
                                                    <td><?= h($purchaseOrders->updated_by) ?></td>
                                                                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'PurchaseOrders', 'action' =>
                            'view', $purchaseOrders->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseOrders', 'action' =>
                            'edit', $purchaseOrders->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseOrders', 'action' =>
                            'delete', $purchaseOrders->id], ['confirm' => __('Are you sure you want to delete #
                            {0}?', $purchaseOrders->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
            </div>
</div>
