<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report $report
 */
?>

<div class="card card-default">
    <div class="card-header d-print-none border-bottom">
        <button onclick="print()" class="btn btn-warning float-right ml-3"><i class="fa fa-print"></i> Imprimir</button>

        <span class="d-inline-block float-right">
            <?= $this->Form->postButton(__('Eliminar informe'), ['action' => 'delete', $report->id], ['confirm' =>
                __('¿Seguro quieres eliminar este informe?'), 'class' => 'btn btn-danger d-inline']) ?>
        </span>

    </div>
    <div class="card-body row">

        <div class="col mb-3 pl-4">
            <div class="d-flex justify-content-between">
                <h3 class="font-weight-light">Informe de <?= strtolower($report->type) ?> # <?= h($report->id) ?></h3>
                <div class="font-italic"><?= h($report->created_at) ?></div>
            </div>
            <div class="font-weight-light">Desde: <?= h($report->date_from) ?></div>
            <div class="font-weight-light">Hasta: <?= h($report->date_to) ?></div>
        </div>

        <div class="col-12 p-0">
            <table class="table table-hover p-0">
                <thead>
                <tr>
                    <th class="p-1 pl-4 pr-4">Artículo</th>
                    <th class="p-1 pl-4 pr-4">Cantidad</th>
                </tr>
                </thead>
                <?php foreach ($reportData as $entry): ?>
                    <tr class="bg-light text-right">
                        <td class="p-1 pl-4 pr-4" colspan="2"><?= $report->type == 'Salidas' ? 'Salida' : 'Entrada' ?>
                            # <?= $entry->id ?> - <?= $entry->date ?></td>
                    </tr>
                    <?php foreach ($entry->articles as $article): ?>
                        <tr>
                            <td class="p-1 pl-4 pr-4"><?= $article['name'] ?></td>
                            <td class="p-1 pl-4 pr-4"><?= $article['_joinData']['quantity'] ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php endforeach ?>
                <tr>
                </tr>
            </table>
        </div>
    </div>
</div>
