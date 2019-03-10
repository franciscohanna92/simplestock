<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>

<?= $this->BootsCakeForm->create($employee) ?>

<div class="card card-default">
    <div class="card-body row">
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">                            <?php echo   $this->BootsCakeForm->control('name', ['required' => false]); ?>
                </div>                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">                            <?php echo   $this->BootsCakeForm->control('surname', ['required' => false]); ?>
                </div>                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">                            <?php echo   $this->BootsCakeForm->control('cuil', ['required' => false]); ?>
                </div>                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">                            <?php echo   $this->BootsCakeForm->control('phone', ['required' => false]); ?>
                </div>                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">                            <?php echo   $this->BootsCakeForm->control('email', ['required' => false]); ?>
                </div>                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">                            <?php echo   $this->BootsCakeForm->control('address', ['required' => false]); ?>
                </div>                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">                            <?php echo   $this->BootsCakeForm->control('position', ['required' => false]); ?>
                </div>                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">                            <?php echo   $this->BootsCakeForm->control('observations', ['required' => false]); ?>
                </div>                                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">                </div>                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">                </div>                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">                </div>                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">                </div>            </div>
    <div class="card-footer">
        <?= $this->BootsCakeForm->control(__('Guardar'), ['type' => 'submit']) ?>
    </div>
</div>
<?= $this->BootsCakeForm->end() ?>
