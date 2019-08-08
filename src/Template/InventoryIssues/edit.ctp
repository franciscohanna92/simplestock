<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InventoryIssue $inventoryIssue
 */
?>

<?= $this->BootsCakeForm->create($inventoryIssue) ?>

<div class="card card-default">
    <div class="card-body row">
                                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo   $this->BootsCakeForm->control('date', ['empty' => true, 'required' => false]); ?>
                </div>                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo  $this->BootsCakeForm->control('employee_id', ['options' => $employees, 'required' => false]); ?>
                </div>                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo  $this->BootsCakeForm->control('building_site_id', ['options' => $buildingSites, 'required' => false]); ?>
                </div>                                        <div class="col-12 col-md-6 col-lg-4">                </div>                            <div class="col-12 col-md-6 col-lg-4">                </div>                            <div class="col-12 col-md-6 col-lg-4">                </div>                            <div class="col-12 col-md-6 col-lg-4">                </div>                <?php echo   $this->BootsCakeForm->control('articles._ids', ['options' => $articles, 'required' => false]); ?>
                    </div>
    <div class="card-footer">
        <?= $this->BootsCakeForm->control(__('Guardar'), ['type' => 'submit']) ?>
    </div>
</div>
<?= $this->BootsCakeForm->end() ?>
