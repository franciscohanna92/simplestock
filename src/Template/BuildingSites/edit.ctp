<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuildingSite $buildingSite
 */
?>

<?= $this->BootsCakeForm->create($buildingSite) ?>

<div class="card card-default">
    <div class="card-body row">
                                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo   $this->BootsCakeForm->control('name', ['required' => false]); ?>
                </div>                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo   $this->BootsCakeForm->control('start_date', ['empty' => true, 'required' => false]); ?>
                </div>                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo   $this->BootsCakeForm->control('address', ['required' => false]); ?>
                </div>                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo   $this->BootsCakeForm->control('observations', ['required' => false]); ?>
                </div>                                        <div class="col-12 col-md-6 col-lg-4">                </div>                            <div class="col-12 col-md-6 col-lg-4">                </div>                            <div class="col-12 col-md-6 col-lg-4">                </div>                            <div class="col-12 col-md-6 col-lg-4">                </div>            </div>
    <div class="card-footer">
        <?= $this->BootsCakeForm->control(__('Guardar'), ['type' => 'submit']) ?>
    </div>
</div>
<?= $this->BootsCakeForm->end() ?>
