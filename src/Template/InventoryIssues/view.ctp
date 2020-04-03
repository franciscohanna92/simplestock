<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InventoryIssue $inventoryIssue
 */
?>

<div class="card card-default">
    <div class="card-header d-print-none border-bottom">
        <button onclick="print()" class="btn btn-warning float-right"><i class="fa fa-print"></i> Imprimir</button>
    </div>
    <div class="card-body row">
        <div class="col mb-3 pl-4">
            <div class="d-flex justify-content-between">
                <h3 class="font-weight-light">Salida # <?= h($inventoryIssue->id) ?></h3>
                <div class="font-italic"><?= h($inventoryIssue->date) ?></div>
            </div>
            <div class="font-weight-light">Descripción: <?= h($inventoryIssue->descriptive_name) ?></div>
            <div class="font-weight-light">Obra destino: <?= h($inventoryIssue->building_site['name']) ?></div>
            <div class="font-weight-light">Se entregó a: <?= h($inventoryIssue->employee['full_name']) ?></div>
        </div>

        <div class="col-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Artículo</th>
                    <th>Cantidad</th>
                </tr>
                </thead>
                <?php foreach ($inventoryIssue->articles as $article): ?>
                    <tr>
                        <td><?= $article['name'] ?> (<?= $article['category']['name'] ?>)</td>
                        <td><?= $article['_joinData']['quantity'] ?></td>
                    </tr>
                <?php endforeach ?>
                <tr>
                </tr>
            </table>
        </div>
    </div>
</div>
