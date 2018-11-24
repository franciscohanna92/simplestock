<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
?>

<div class="card card-default">
        <div class="card card-header m-0">
        <input type="text" class="form-control" placeholder="Buscar...">
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                                                <th scope="col"><?= $this->Paginator->sort('id', '#') ?></th>

                                                <th scope="col"><?= $this->Paginator->sort('name') ?></th>

                                                <th scope="col"><?= $this->Paginator->sort('surname') ?></th>

                                                <th scope="col"><?= $this->Paginator->sort('cuil') ?></th>

                                                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>

                                                <th scope="col"><?= $this->Paginator->sort('email') ?></th>

                                                <th scope="col"><?= $this->Paginator->sort('address') ?></th>

                                                <th scope="col"><?= $this->Paginator->sort('position') ?></th>

                    

                                                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>

                    

                    

                    

                    

                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($employees as $employee): ?>
                <tr>
                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($employee->id) ?></td>
                                                                                                                                                                                                                                                                                                                                    <td><?= h($employee->name) ?></td>
                                                                                                                                                                                                                                                                                                                                    <td><?= h($employee->surname) ?></td>
                                                                                                                                                                                                                                                                                                                                    <td><?= h($employee->cuil) ?></td>
                                                                                                                                                                                                                                                                                                                                    <td><?= h($employee->phone) ?></td>
                                                                                                                                                                                                                                                                                                                                    <td><?= h($employee->email) ?></td>
                                                                                                                                                                                                                                                                                                                                    <td><?= h($employee->address) ?></td>
                                                                                                                                                                                                                                                                                                                                    <td><?= h($employee->position) ?></td>
                                                                                                                                                                                                                                                                    <td><?= $employee->has('company') ?
                                        $this->Html->link($employee
                                        ->company->name, ['controller' =>
                                        'Companies', 'action' => 'view', $employee
                                        ->company
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                                                                                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $employee->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' =>
                        __('¿Seguro quieres eliminar este employee?')]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer">
        <nav>
            <ul class="pagination">
                <?php
                echo $this->BootsCakePaginator->first();
                echo $this->BootsCakePaginator->prev();
                echo $this->BootsCakePaginator->numbers();
                echo $this->BootsCakePaginator->next();
                echo $this->BootsCakePaginator->last();
                ?>
            </ul>
        </nav>
    </div>
</div>
