<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>

<?= $this->BootsCakeForm->create($client) ?>
<div class="card card-default">
    <div class="card-body row">
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('name', ['required' => true, 'label' => 'Nombre']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('phone', ['required' => true, 'label' => 'Teléfono']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('address', ['required' => true, 'label' => 'Dirección']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('cuit', ['required' => true, 'label' => 'CUIT']); ?>
        </div>
    </div>
    <div class="card-footer">
        <?= $this->BootsCakeForm->control(__('Guardar'), ['type' => 'submit']) ?>
    </div>
</div>
<?= $this->BootsCakeForm->end() ?>
