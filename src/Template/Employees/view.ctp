<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>

<div class="card card-default">
    <div class="card-body p-0">
        <table class="table table-bordered">
            <tr>
                <th scope="row"><?= __('Nombre completo') ?></th>
                <td><?= h($employee->lastname) ?>, <?= h($employee->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('DNI') ?></th>
                <td><?= h($employee->dni) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Teleéfono') ?></th>
                <td><?= h($employee->phone) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('E-mail') ?></th>
                <td><?= h($employee->email) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Dirección') ?></th>
                <td><?= h($employee->address) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Cargo') ?></th>
                <td><?= h($employee->position) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Obra actual') ?></th>
                <td><?= h($employee->building_site->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Observaciones') ?></th>
                <td><?= h($employee->observations) ?></td>
            </tr>
        </table>
    </div>
</div>
