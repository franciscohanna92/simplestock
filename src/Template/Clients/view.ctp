<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>

<div class="card card-default">
    <div class="card-body p-0">
        <table class="table table-bordered">
            <tr>
                <th scope="row"><?= __('Nombre') ?></th>
                <td><?= h($client->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Dirección') ?></th>
                <td><?= h($client->address) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Teléfono') ?></th>
                <td><?= h($client->phone) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('CUIT') ?></th>
                <td><?= h($client->cuit) ?></td>
            </tr>
        </table>
    </div>
</div>

