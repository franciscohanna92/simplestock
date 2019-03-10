<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?= $this->BootsCakeForm->create($user) ?>

<div class="card card-default">
    <div class="card-body row">
                                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">                                <?php echo   $this->BootsCakeForm->control('email', ['required' => false]); ?>
                    </div>                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">                                <?php echo   $this->BootsCakeForm->control('password', ['required' => false]); ?>
                    </div>                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">                                    <?php echo  $this->BootsCakeForm->control('company_id', ['options' => $companies, 'required' => false]); ?>
                    </div>                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">                    </div>                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">                    </div>                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">                    </div>                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">                    </div>                </div>
    <div class="card-footer">
        <?= $this->BootsCakeForm->control(__('Guardar'), ['type' => 'submit']) ?>
    </div>
</div>
<?= $this->BootsCakeForm->end() ?>
