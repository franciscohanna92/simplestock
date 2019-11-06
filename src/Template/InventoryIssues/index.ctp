<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InventoryIssues[]|\Cake\Collection\CollectionInterface $inventoryIssues
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
                <form class="m-0" action="/inventoryIssues" method="get">
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
                        <?php if ($searchQuery != ''): ?>
                            <div class="input-group-append">
                                <a href="/inventoryIssues" class="bg-white input-group-text px-2 py-0">
                                    <span style="line-height: 33px;" class="text-primary">✕</span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            <?php if ($this->Roles->deny($authUser['role'], ['COMPRAS', 'ADMIN'])): ?>
                <div class="col-12 offset-md-4 col-md-4 offset-lg-6 col-lg-3">
                    <a href="/inventory-issues/add" class="btn btn-primary h-100 float-right">
                        Registrar nueva salida
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id', '#') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('descriptive_name', 'Nombre descriptivo') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('date', 'Fecha de salida') ?></th>
                    <th scope="col">Obra destino</th>
                    <th scope="col">Se entregó a</th>
                    <th scope="col" class="actions" width="150px"><?= __('Acciones') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($inventoryIssues as $inventoryReceipt): ?>
                    <tr>
                        <td><?= h($inventoryReceipt->id) ?></td>
                        <td><?= h($inventoryReceipt->descriptive_name) ?></td>
                        <td><?= h($inventoryReceipt->date) ?></td>
                        <td><?= $inventoryReceipt->has('building_site_id') ?
                                $this->Html->link($inventoryReceipt->building_site->name, [
                                    'controller' => 'BuildingSites',
                                    'action' => 'view',
                                    $inventoryReceipt->building_site->id
                                ]) : '' ?>
                        </td>
                        <td><?= $inventoryReceipt->has('employee_id') ?
                                $this->Html->link($inventoryReceipt->employee->full_name, [
                                    'controller' => 'Employees',
                                    'action' => 'view',
                                    $inventoryReceipt->employee->id
                                ]) : '' ?>
                        </td>

                        <td class="actions d-flex justify-content-between">
                            <div>
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $inventoryReceipt->id]) ?>
                            </div>
                            <?php if ($this->Roles->deny($authUser['role'], ['COMPRAS', 'ADMIN'])): ?>
                                <div>
                                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $inventoryReceipt->id], ['confirm' =>
                                        __('¿Seguro quieres eliminar este inventoryReceipt?')]) ?>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (count($inventoryIssues) == 0): ?>
                    <tr>
                        <td class="text-center text-muted" colspan="9">No hay registros para mostrar</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if (count($inventoryIssues) > 0): ?>
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
                <?php echo $this->Paginator->counter('Mostrando {{current}} filas de {{count}}'); ?>
            </span>
            </p>
        </div>
    <?php endif; ?>
</div>
