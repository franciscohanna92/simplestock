<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuildingSite $buildingSite
 */
?>

<div class="card card-default">
    <div class="card-body p-0">
        <table class="table table-bordered">
            <tr>
                <th scope="row"><?= __('Nombre') ?></th>
                <td><?= h($buildingSite->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Dirección') ?></th>
                <td><?= h($buildingSite->address) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Fecha de inicio') ?></th>
                <td><?= h($buildingSite->start_date) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Observaciones') ?></th>
                <td><?= h($buildingSite->observations) ?></td>
            </tr>
        </table>
    </div>
</div>
