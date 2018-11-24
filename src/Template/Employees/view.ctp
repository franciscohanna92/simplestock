<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id]) ?></li>
        <li><?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?>
        </li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?></li>
                                                                <li><?= $this->Html->link(__('List Companies'), ['controller' =>
                        'Companies', 'action' => 'index']) ?>
                    </li>
                    <li><?= $this->Html->link(__('New Company'), ['controller' =>
                        'Companies', 'action' => 'add']) ?>
                    </li>
                                                                                                                            <li><?= $this->Html->link(__('List Inventory Issues'), ['controller' =>
                        'InventoryIssues', 'action' => 'index']) ?>
                    </li>
                    <li><?= $this->Html->link(__('New Inventory Issue'), ['controller' =>
                        'InventoryIssues', 'action' => 'add']) ?>
                    </li>
                                                                                </ul>
</nav>
<div class="employees view large-9 medium-8 columns content">
    <h3><?= h($employee->name) ?></h3>
    <table class="vertical-table">
                                                        <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($employee->name) ?></td>
                    </tr>
                                                                <tr>
                        <th scope="row"><?= __('Surname') ?></th>
                        <td><?= h($employee->surname) ?></td>
                    </tr>
                                                                <tr>
                        <th scope="row"><?= __('Cuil') ?></th>
                        <td><?= h($employee->cuil) ?></td>
                    </tr>
                                                                <tr>
                        <th scope="row"><?= __('Phone') ?></th>
                        <td><?= h($employee->phone) ?></td>
                    </tr>
                                                                <tr>
                        <th scope="row"><?= __('Email') ?></th>
                        <td><?= h($employee->email) ?></td>
                    </tr>
                                                                <tr>
                        <th scope="row"><?= __('Address') ?></th>
                        <td><?= h($employee->address) ?></td>
                    </tr>
                                                                <tr>
                        <th scope="row"><?= __('Position') ?></th>
                        <td><?= h($employee->position) ?></td>
                    </tr>
                                                                <tr>
                        <th scope="row"><?= __('Observations') ?></th>
                        <td><?= h($employee->observations) ?></td>
                    </tr>
                                                                                    <tr>
                        <th scope="row"><?= __('Company') ?></th>
                        <td><?= $employee->has('company') ? $this->Html->link($employee
                            ->company->name, ['controller' =>
                            'Companies', 'action' => 'view', $employee->company
                            ->id]) : '' ?>
                        </td>
                    </tr>
                                                                                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($employee->id) ?></td>
                </tr>
                            <tr>
                    <th scope="row"><?= __('Updated By') ?></th>
                    <td><?= $this->Number->format($employee->updated_by) ?></td>
                </tr>
                            <tr>
                    <th scope="row"><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($employee->created_by) ?></td>
                </tr>
                                                        <tr>
                    <th scope="row"><?= __('Created At') ?></th>
                    <td><?= h($employee->created_at) ?></td>
                </tr>
                            <tr>
                    <th scope="row"><?= __('Updated At') ?></th>
                    <td><?= h($employee->updated_at) ?></td>
                </tr>
                                </table>
                                    <div class="related">
            <h4><?= __('Related Inventory Issues') ?></h4>
            <?php if (!empty($employee->inventory_issues)): ?>
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
                <?php foreach ($employee->inventory_issues as $inventoryIssues): ?>
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
