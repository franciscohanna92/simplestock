<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report $report
 */
?>

<?= $this->BootsCakeForm->create($report) ?>

<div class="card card-default">
    <div class="card-body row">
        <div class="col-12 col-md-6 col-lg-4">
            <label for="type">Tipo</label>
            <select name="type" id="type" class="form-control" required>
                <option value="Salidas">Salidas</option>
                <option value="Entradas">Entradas</option>
            </select>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <?php echo $this->BootsCakeForm->control('date_from', ['required' => true, 'label' => 'Desde']); ?>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <?php echo $this->BootsCakeForm->control('date_to', ['required' => false, 'label' => 'Hasta']); ?>
        </div>
    </div>
    <div class="card-footer">
        <?= $this->BootsCakeForm->control(__('Generar informe'), ['type' => 'submit']) ?>
    </div>
</div>
<?= $this->BootsCakeForm->end() ?>
