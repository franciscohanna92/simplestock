<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Provider $provider
 */
?>

<div class="card">
    <div class="card-body">
                <table class="vertical-table">
                                                                        <tr>
                            <th scope="row"><?= __('Name') ?></th>
                            <td><?= h($provider->name) ?></td>
                        </tr>
                                                                                <tr>
                            <th scope="row"><?= __('Address') ?></th>
                            <td><?= h($provider->address) ?></td>
                        </tr>
                                                                                <tr>
                            <th scope="row"><?= __('Website') ?></th>
                            <td><?= h($provider->website) ?></td>
                        </tr>
                                                                                <tr>
                            <th scope="row"><?= __('Email') ?></th>
                            <td><?= h($provider->email) ?></td>
                        </tr>
                                                                                <tr>
                            <th scope="row"><?= __('Phone') ?></th>
                            <td><?= h($provider->phone) ?></td>
                        </tr>
                                                                                <tr>
                            <th scope="row"><?= __('Cuit') ?></th>
                            <td><?= h($provider->cuit) ?></td>
                        </tr>
                                                                                                        <tr>
                            <th scope="row"><?= __('City') ?></th>
                            <td><?= $provider->has('city') ? $this->Html->link($provider
                                ->city->name, ['controller' =>
                                'Cities', 'action' => 'view', $provider->city
                                ->id]) : '' ?>
                            </td>
                        </tr>
                                                                                                        <tr>
                            <th scope="row"><?= __('Company') ?></th>
                            <td><?= $provider->has('company') ? $this->Html->link($provider
                                ->company->name, ['controller' =>
                                'Companies', 'action' => 'view', $provider->company
                                ->id]) : '' ?>
                            </td>
                        </tr>
                                                                                                        <tr>
                            <th scope="row"><?= __('Province') ?></th>
                            <td><?= $provider->has('province') ? $this->Html->link($provider
                                ->province->name, ['controller' =>
                                'Provinces', 'action' => 'view', $provider->province
                                ->id]) : '' ?>
                            </td>
                        </tr>
                                                                                                            <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($provider->id) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Created By') ?></th>
                        <td><?= $this->Number->format($provider->created_by) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Updated By') ?></th>
                        <td><?= $this->Number->format($provider->updated_by) ?></td>
                    </tr>
                                                                            <tr>
                        <th scope="row"><?= __('Created At') ?></th>
                        <td><?= h($provider->created_at) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Updated At') ?></th>
                        <td><?= h($provider->updated_at) ?></td>
                    </tr>
                                                </table>
                                    <div class="row">
                    <h4><?= __('Observations') ?></h4>
                    <?= $this->Text->autoParagraph(h($provider->observations)); ?>
                </div>
                                                                        <div class="related">
                <h4><?= __('Related Articles') ?></h4>
                <?php if (!empty($provider->articles)): ?>
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
                    <?php foreach ($provider->articles as $articles): ?>
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
                                            <div class="related">
                <h4><?= __('Related Purchase Orders') ?></h4>
                <?php if (!empty($provider->purchase_orders)): ?>
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
                    <?php foreach ($provider->purchase_orders as $purchaseOrders): ?>
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
