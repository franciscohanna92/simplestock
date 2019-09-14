<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuildingSite $buildingSite
 */
?>

<?= $this->BootsCakeForm->create($buildingSite, ['autocomplete' => 'off']) ?>
<div class="card card-default">
    <div class="card-body row">
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('name', ['required' => true, 'label' => 'Nombre']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('start_date', ['empty' => true, 'required' => true, 'label' => 'Fecha de inicio']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('address', ['required' => true, 'label' => 'Dirección']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('observations', ['required' => true, 'label' => 'Observaciones']); ?>
        </div>
    </div>
    <div class="card-footer">
        <?= $this->BootsCakeForm->control(__('Guardar'), ['type' => 'submit']) ?>
    </div>
</div>
<?= $this->BootsCakeForm->end() ?>
