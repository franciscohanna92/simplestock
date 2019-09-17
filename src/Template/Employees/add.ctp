<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>

<?= $this->BootsCakeForm->create($employee) ?>
<div class="card card-default">
    <div class="card-body row">
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('name', ['required' => true, 'label' => 'Nombre']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('lastname', ['required' => true, 'label' => 'Apellido']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('dni', ['required' => false, 'label' => 'DNI']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('phone', ['required' => false, 'label' => 'Teléfono']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('email', ['required' => false, 'label' => 'E-mail']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('address', ['required' => false, 'label' => 'Dirección']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('position', ['required' => false, 'label' => 'Cargo']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('building_site_id', ['empty' => true, 'options' => $buildingSites, 'required' => false, 'label' => 'Obra actual']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('observations', ['required' => false, 'label' => 'Observaciones']); ?>
        </div>
    </div>
    <div class="card-footer">
        <?= $this->BootsCakeForm->control(__('Guardar'), ['type' => 'submit']) ?>
    </div>
</div>
<?= $this->BootsCakeForm->end() ?>
