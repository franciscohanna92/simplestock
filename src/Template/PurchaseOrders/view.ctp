<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseOrder $purchaseOrder
 */
?>

<div class="card">
    <div class="card-body">
                <table class="vertical-table">
                                                                        <tr>
                            <th scope="row"><?= __('Date') ?></th>
                            <td><?= h($purchaseOrder->date) ?></td>
                        </tr>
                                                                                <tr>
                            <th scope="row"><?= __('Observations') ?></th>
                            <td><?= h($purchaseOrder->observations) ?></td>
                        </tr>
                                                                                                        <tr>
                            <th scope="row"><?= __('Provider') ?></th>
                            <td><?= $purchaseOrder->has('provider') ? $this->Html->link($purchaseOrder
                                ->provider->id, ['controller' =>
                                'Providers', 'action' => 'view', $purchaseOrder->provider
                                ->id]) : '' ?>
                            </td>
                        </tr>
                                                                                                        <tr>
                            <th scope="row"><?= __('Purchase Orders Status') ?></th>
                            <td><?= $purchaseOrder->has('purchase_orders_status') ? $this->Html->link($purchaseOrder
                                ->purchase_orders_status->name, ['controller' =>
                                'PurchaseOrdersStatuses', 'action' => 'view', $purchaseOrder->purchase_orders_status
                                ->id]) : '' ?>
                            </td>
                        </tr>
                                                                                                        <tr>
                            <th scope="row"><?= __('Company') ?></th>
                            <td><?= $purchaseOrder->has('company') ? $this->Html->link($purchaseOrder
                                ->company->name, ['controller' =>
                                'Companies', 'action' => 'view', $purchaseOrder->company
                                ->id]) : '' ?>
                            </td>
                        </tr>
                                                                                                            <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($purchaseOrder->id) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Created By') ?></th>
                        <td><?= $this->Number->format($purchaseOrder->created_by) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Updated By') ?></th>
                        <td><?= $this->Number->format($purchaseOrder->updated_by) ?></td>
                    </tr>
                                                                            <tr>
                        <th scope="row"><?= __('Created At') ?></th>
                        <td><?= h($purchaseOrder->created_at) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Updated At') ?></th>
                        <td><?= h($purchaseOrder->updated_at) ?></td>
                    </tr>
                                                </table>
                                                            <div class="related">
                <h4><?= __('Related Articles') ?></h4>
                <?php if (!empty($purchaseOrder->articles)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                                                    <th scope="col"><?= __('Id') ?></th>
                                                    <th scope="col"><?= __('Name') ?></th>
                                                    <th scope="col"><?= __('Description') ?></th>
                                                    <th scope="col"><?= __('Security Stock') ?></th>
                                                    <th scope="col"><?= __('Internal Code') ?></th>
                                                    <th scope="col"><?= __('Provider Code') ?></th>
                                                    <th scope="col"><?= __('Cateogry Id') ?></th>
                                                    <th scope="col"><?= __('Provider Id') ?></th>
                                                    <th scope="col"><?= __('Company Id') ?></th>
                                                    <th scope="col"><?= __('Created At') ?></th>
                                                    <th scope="col"><?= __('Created By') ?></th>
                                                    <th scope="col"><?= __('Updated At') ?></th>
                                                    <th scope="col"><?= __('Updated By') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($purchaseOrder->articles as $articles): ?>
                    <tr>
                                                    <td><?= h($articles->id) ?></td>
                                                    <td><?= h($articles->name) ?></td>
                                                    <td><?= h($articles->description) ?></td>
                                                    <td><?= h($articles->security_stock) ?></td>
                                                    <td><?= h($articles->internal_code) ?></td>
                                                    <td><?= h($articles->provider_code) ?></td>
                                                    <td><?= h($articles->cateogry_id) ?></td>
                                                    <td><?= h($articles->provider_id) ?></td>
                                                    <td><?= h($articles->company_id) ?></td>
                                                    <td><?= h($articles->created_at) ?></td>
                                                    <td><?= h($articles->created_by) ?></td>
                                                    <td><?= h($articles->updated_at) ?></td>
                                                    <td><?= h($articles->updated_by) ?></td>
                                                                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Articles', 'action' =>
                            'view', $articles->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Articles', 'action' =>
                            'edit', $articles->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Articles', 'action' =>
                            'delete', $articles->id], ['confirm' => __('Are you sure you want to delete #
                            {0}?', $articles->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
            </div>
</div>
