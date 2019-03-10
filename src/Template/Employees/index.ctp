<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
?>

<style>
    .form-control:focus {
        border-color: #dde6e9;
    }
</style>

<div class="card card-default">
        <div class="card card-header m-0">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <form class="m-0" action="/employees" method="get">
                    <div class="input-group">
                        <div class="border-right-0 input-group-prepend">
                            <span class="input-group-text bg-white border-right-0 input-group-text pr-0 pl-2">
                                <i class="fa fa-search text-muted"></i>
                            </span>
                        </div>
                        <input class="form-control border-left-0 <?= $searchQuery != '' ? 'border-right-0' : '' ?>"
                               type="text"
                               name="searchQuery"
                               placeholder="Buscar..."
                               value="<?= $searchQuery; ?>"
                               required>
                        <?php if($searchQuery != ''): ?>
                        <div class="input-group-append">
                            <a href="/employees" class="bg-white input-group-text px-2 py-0">
                                <span style="line-height: 33px;" class="text-primary">✕</span>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            <div class="col-12 offset-md-4 col-md-4 offset-lg-6 col-lg-3">
                <a href="/employees/add" class="btn btn-primary h-100 float-right">
                    Agregar nuevo employee
                </a>
            </div>
        </div>
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
                                                                                                                                                                                                                                                <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $employee->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' =>
                        __('¿Seguro quieres eliminar este employee?')]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(count($employees) == 0): ?>
                <tr>
                    <td class="text-center text-muted" colspan="14">No hay registros para mostrar</td>
                </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if(count($employees) > 0): ?>
    <div class="card-footer d-flex justify-content-between">
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

        <p style="line-height: 35px;">
            <span>
                <?php echo $this->Paginator->counter( 'Mostrando {{current}} filas de {{count}}' ); ?>
            </span>
        </p>
    </div>
    <?php endif; ?>
</div>
