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
                        <?php if($searchQuery != ''): ?>
                        <div class="input-group-append">
                            <a href="/buildingSites" class="bg-white input-group-text px-2 py-0">
                                <span style="line-height: 33px;" class="text-primary">✕</span>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            <div class="col-12 offset-md-4 col-md-4 offset-lg-6 col-lg-3">
                <a href="/buildingSites/add" class="btn btn-primary h-100 float-right">
                    Agregar nuevo buildingSite
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

                                                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>

                                                <th scope="col"><?= $this->Paginator->sort('address') ?></th>

                    

                    

                    

                    

                    

                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($buildingSites as $buildingSite): ?>
                <tr>
                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($buildingSite->id) ?></td>
                                                                                                                                                                                                                                                                                                                                    <td><?= h($buildingSite->name) ?></td>
                                                                                                                                                                                                                                                                                                                                    <td><?= h($buildingSite->start_date) ?></td>
                                                                                                                                                                                                                                                                                                                                    <td><?= h($buildingSite->address) ?></td>
                                                                                                                                                                                                                            <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $buildingSite->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $buildingSite->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $buildingSite->id], ['confirm' =>
                        __('¿Seguro quieres eliminar este buildingSite?')]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(count($buildingSites) == 0): ?>
                <tr>
                    <td class="text-center text-muted" colspan="9">No hay registros para mostrar</td>
                </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if(count($buildingSites) > 0): ?>
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
