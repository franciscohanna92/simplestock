<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InventoryReceipt $inventoryReceipt
 */
?>

<div class="card card-default">
    <div class="card-body row">

        <div class="col mb-3 pl-4">
            <h2 class="font-weight-light">Entrada Nº <?= h($inventoryReceipt->number) ?></h2>
            <div class="lead">Fecha de ingreso <?= h($inventoryReceipt->date) ?></div>
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
