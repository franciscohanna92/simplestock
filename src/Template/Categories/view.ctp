<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

<div class="card">
    <div class="card-body">
                <table class="vertical-table">
                                                                        <tr>
                            <th scope="row"><?= __('Name') ?></th>
                            <td><?= h($category->name) ?></td>
                        </tr>
                                                                                                        <tr>
                            <th scope="row"><?= __('Company') ?></th>
                            <td><?= $category->has('company') ? $this->Html->link($category
                                ->company->name, ['controller' =>
                                'Companies', 'action' => 'view', $category->company
                                ->id]) : '' ?>
                            </td>
                        </tr>
                                                                                                            <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($category->id) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Created By') ?></th>
                        <td><?= $this->Number->format($category->created_by) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Updated By') ?></th>
                        <td><?= $this->Number->format($category->updated_by) ?></td>
                    </tr>
                                                                            <tr>
                        <th scope="row"><?= __('Created At') ?></th>
                        <td><?= h($category->created_at) ?></td>
                    </tr>
                                    <tr>
                        <th scope="row"><?= __('Updated At') ?></th>
                        <td><?= h($category->updated_at) ?></td>
                    </tr>
                                                </table>
                            </div>
</div>
