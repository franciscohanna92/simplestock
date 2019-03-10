<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?></li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
        </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
                                                                <li><?= $this->Html->link(__('List Companies'), ['controller' =>
                        'Companies', 'action' => 'index']) ?>
                    </li>
                    <li><?= $this->Html->link(__('New Company'), ['controller' =>
                        'Companies', 'action' => 'add']) ?>
                    </li>
                                                                                                                        </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
                                                        <tr>
                        <th scope="row"><?= __('Email') ?></th>
                        <td><?= h($user->email) ?></td>
                    </tr>
                                                                <tr>
                        <th scope="row"><?= __('Password') ?></th>
                        <td><?= h($user->password) ?></td>
                    </tr>
                                                                                    <tr>
                        <th scope="row"><?= __('Company') ?></th>
                        <td><?= $user->has('company') ? $this->Html->link($user
                            ->company->name, ['controller' =>
                            'Companies', 'action' => 'view', $user->company
                            ->id]) : '' ?>
                        </td>
                    </tr>
                                                                                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                            <tr>
                    <th scope="row"><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($user->created_by) ?></td>
                </tr>
                            <tr>
                    <th scope="row"><?= __('Updated By') ?></th>
                    <td><?= $this->Number->format($user->updated_by) ?></td>
                </tr>
                                                        <tr>
                    <th scope="row"><?= __('Created At') ?></th>
                    <td><?= h($user->created_at) ?></td>
                </tr>
                            <tr>
                    <th scope="row"><?= __('Updated At') ?></th>
                    <td><?= h($user->updated_at) ?></td>
                </tr>
                                </table>
            </div>
