<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuildingSite[]|\Cake\Collection\CollectionInterface $buildingSites
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
                <form class="m-0" action="/buildingSites" method="get">
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
                                <a href="/buildingSites" class="bg-white input-group-text px-2 py-0">
                                    <span style="line-height: 33px;" class="text-primary">✕</span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            <?php if ($this->Roles->deny($authUser['role'], ['COMPRAS', 'ADMIN'])): ?>
                <div class="col-12 offset-md-4 col-md-4 offset-lg-6 col-lg-3">
                    <a href="/building-sites/add" class="btn btn-primary h-100 float-right">
                        Agregar nueva obra
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id', '#') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('name', 'Nombre') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('start_date', 'Fecha de inicio') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('address', 'Dirección') ?></th>
                    <th scope="col" class="actions" width="150px"><?= __('Acciones') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($buildingSites as $buildingSite): ?>
                    <tr>
                        <td><?= $this->Number->format($buildingSite->id) ?></td>
                        <td><?= h($buildingSite->name) ?></td>
                        <td><?= h($buildingSite->start_date) ?></td>
                        <td><?= h($buildingSite->address) ?></td>
                        <td class="actions d-flex justify-content-between">
                            <div>
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $buildingSite->id]) ?>
                            </div>

                            <?php if ($this->Roles->deny($authUser['role'], ['COMPRAS', 'ADMIN'])): ?>
                                <div>
                                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $buildingSite->id]) ?>
                                </div>
                                <div>
                                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $buildingSite->id], ['confirm' =>
                                        __('¿Seguro quieres eliminar esta obra?')]) ?>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (count($buildingSites) == 0): ?>
                    <tr>
                        <td class="text-center text-muted" colspan="9">No hay registros para mostrar</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if (count($buildingSites) > 0): ?>
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
