<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report[]|\Cake\Collection\CollectionInterface $reports
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
            </div>

            <div class="col-12 offset-md-4 col-md-4 offset-lg-6 col-lg-3">
                <a href="/reports/add" class="btn btn-primary h-100 float-right">
                    Generar nuevo informe
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
                    <th scope="col"><?= $this->Paginator->sort('type', 'Tipo') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('date_from', 'Desde') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('date_to', 'Hasta') ?></th>
                    <th scope="col" class="actions" width="150px"><?= __('Acciones') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($reports as $report): ?>
                    <tr>
                        <td><?= $this->Number->format($report->id) ?></td>
                        <td><?= h($report->type) ?></td>
                        <td><?= h($report->date_from) ?></td>
                        <td><?= h($report->date_to) ?></td>
                        <td class="actions d-flex justify-content-between">
                            <div>
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $report->id]) ?>
                            </div>
                            <div>
                                <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $report->id], ['confirm' =>
                                    __('¿Seguro quieres eliminar este informe?')]) ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (count($reports) == 0): ?>
                    <tr>
                        <td class="text-center text-muted" colspan="9">No hay registros para mostrar</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if (count($reports) > 0): ?>
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
