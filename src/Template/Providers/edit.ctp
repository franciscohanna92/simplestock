<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Provider $provider
 */
?>

<?= $this->BootsCakeForm->create($provider) ?>

<div class="card card-default">
    <div class="card-body row">
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('name', ['required' => false, 'label' => 'Nombre']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('address', ['required' => false, 'label' => 'Dirección']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('website', ['required' => false, 'label' => 'Sitio web']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('email', ['required' => false, 'label' => 'Email']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('phone', ['required' => false, 'label' => 'Teléfono']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('cuit', ['required' => false, 'label' => 'CUIT']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('observations', ['required' => false, 'label' => 'Observaciones']); ?>
        </div>
        <!--<div class="col-12">
            <?php /*echo $this->BootsCakeForm->control('city_id', ['options' => $cities, 'required' => false, 'label' => 'Nombre']); */?>
        </div>-->

    </div>
    <div class="card-footer">
        <?= $this->BootsCakeForm->control(__('Guardar'), ['type' => 'submit']) ?>
    </div>
</div>
<?= $this->BootsCakeForm->end() ?>
