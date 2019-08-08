<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuildingSite $buildingSite
 */
?>

<div class="card">
    <div class="card-body">
                <table class="vertical-table">
                                                                        <tr>
                            <th scope="row"><?= __('Name') ?></th>
                            <td><?= h($buildingSite->name) ?></td>
                        </tr>
                                                                                <tr>
                            <th scope="row"><?= __('Address') ?></th>
                            <td><?= h($buildingSite->address) ?></td>
                        </tr>
                                                                                                        <tr>
                            <th scope="row"><?= __('Company') ?></th>
                            <td><?= $buildingSite->has('company') ? $this->Html->link($buildingSite
                                ->company->name, ['controller' =>
                                'Companies', 'action' => 'view', $buildingSite->company
                                ->id]) : '' ?>
                            </td>
                        </tr>
                                                                                                            <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($buildingSite->id) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Created By') ?></th>
                        <td><?= $this->Number->format($buildingSite->created_by) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Updated By') ?></th>
                        <td><?= $this->Number->format($buildingSite->updated_by) ?></td>
                    </tr>
                                                                            <tr>
                        <th scope="row"><?= __('Start Date') ?></th>
                        <td><?= h($buildingSite->start_date) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Created At') ?></th>
                        <td><?= h($buildingSite->created_at) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Updated At') ?></th>
                        <td><?= h($buildingSite->updated_at) ?></td>
                    </tr>
                                                </table>
                                    <div class="row">
                    <h4><?= __('Observations') ?></h4>
                    <?= $this->Text->autoParagraph(h($buildingSite->observations)); ?>
                </div>
                                                                        <div class="related">
                <h4><?= __('Related Inventory Issues') ?></h4>
                <?php if (!empty($buildingSite->inventory_issues)): ?>
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
                    <?php foreach ($buildingSite->inventory_issues as $inventoryIssues): ?>
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
            </div>
</div>
