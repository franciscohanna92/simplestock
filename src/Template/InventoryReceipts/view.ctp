<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InventoryReceipt $inventoryReceipt
 */
?>

<div class="card card-default">
    <div class="card-header d-print-none border-bottom">
        <button onclick="print()" class="btn btn-warning float-right"><i class="fa fa-print"></i> Imprimir</button>
    </div>
    <div class="card-body row">
        <div class="col mb-3 pl-4">
            <div class="d-flex justify-content-between">
                <h3 class="font-weight-light">Entrada # <?= h($inventoryReceipt->id) ?></h3>
                <div class="font-italic"><?= h($inventoryReceipt->date) ?></div>
            </div>
            <div class="font-weight-light">Descripción: <?= h($inventoryReceipt->descriptive_name) ?></div>
            <div class="font-weight-light">Proveedor: <?= h($inventoryReceipt->provider['name']) ?></div>
        </div>
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Artículo</th>
                    <th>Cantidad</th>
                </tr>
                </thead>
                <?php foreach ($inventoryReceipt->articles as $article): ?>
                <tr>
                    <td><?= $article['name'] ?></td>
                    <td><?= $article['_joinData']['quantity'] ?></td>
                </tr>
                <?php endforeach ?>
                <tr>
                </tr>
            </table>
        </div>
    </div>
</div>
