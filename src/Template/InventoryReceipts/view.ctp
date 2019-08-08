<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InventoryReceipt $inventoryReceipt
 */
?>

<div class="card">
    <div class="card-body">
                <table class="vertical-table">
                                                                        <tr>
                            <th scope="row"><?= __('Number') ?></th>
                            <td><?= h($inventoryReceipt->number) ?></td>
                        </tr>
                                                                                                        <tr>
                            <th scope="row"><?= __('Provider') ?></th>
                            <td><?= $inventoryReceipt->has('provider') ? $this->Html->link($inventoryReceipt
                                ->provider->id, ['controller' =>
                                'Providers', 'action' => 'view', $inventoryReceipt->provider
                                ->id]) : '' ?>
                            </td>
                        </tr>
                                                                                                        <tr>
                            <th scope="row"><?= __('Company') ?></th>
                            <td><?= $inventoryReceipt->has('company') ? $this->Html->link($inventoryReceipt
                                ->company->name, ['controller' =>
                                'Companies', 'action' => 'view', $inventoryReceipt->company
                                ->id]) : '' ?>
                            </td>
                        </tr>
                                                                                                            <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($inventoryReceipt->id) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Created By') ?></th>
                        <td><?= $this->Number->format($inventoryReceipt->created_by) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Updated By') ?></th>
                        <td><?= $this->Number->format($inventoryReceipt->updated_by) ?></td>
                    </tr>
                                                                            <tr>
                        <th scope="row"><?= __('Date') ?></th>
                        <td><?= h($inventoryReceipt->date) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Created At') ?></th>
                        <td><?= h($inventoryReceipt->created_at) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Updated At') ?></th>
                        <td><?= h($inventoryReceipt->updated_at) ?></td>
                    </tr>
                                                </table>
                                                            <div class="related">
                <h4><?= __('Related Articles') ?></h4>
                <?php if (!empty($inventoryReceipt->articles)): ?>
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
                    <?php foreach ($inventoryReceipt->articles as $articles): ?>
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
