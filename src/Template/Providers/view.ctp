<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Provider $provider
 */
?>

<div class="card card-default">
    <div class="card-body p-0">
        <table class="table table-hover">
            <tr>
                <th scope="row"><?= __('Dirección') ?></th>
                <td><?= h($provider->address) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Sitio web') ?></th>
                <td><?= h($provider->website) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('E-mail') ?></th>
                <td><?= h($provider->email) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Teléfono') ?></th>
                <td><?= h($provider->phone) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('CUIT') ?></th>
                <td><?= h($provider->cuit) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Observations') ?></th>
                <td><?= $this->Text->autoParagraph(h($provider->observations)); ?></td>
            </tr>
        </table>
    </div>
</div>
