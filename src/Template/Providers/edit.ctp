<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Provider $provider
 */
?>

<?= $this->BootsCakeForm->create($provider) ?>

<div class="card card-default">
    <div class="card-body row">
                                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo   $this->BootsCakeForm->control('name', ['required' => false]); ?>
                </div>                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo   $this->BootsCakeForm->control('address', ['required' => false]); ?>
                </div>                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo   $this->BootsCakeForm->control('website', ['required' => false]); ?>
                </div>                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo   $this->BootsCakeForm->control('email', ['required' => false]); ?>
                </div>                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo   $this->BootsCakeForm->control('phone', ['required' => false]); ?>
                </div>                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo   $this->BootsCakeForm->control('cuit', ['required' => false]); ?>
                </div>                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo   $this->BootsCakeForm->control('observations', ['required' => false]); ?>
                </div>                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo  $this->BootsCakeForm->control('city_id', ['options' => $cities, 'required' => false]); ?>
                </div>                                        <div class="col-12 col-md-6 col-lg-4">                </div>                            <div class="col-12 col-md-6 col-lg-4">                </div>                            <div class="col-12 col-md-6 col-lg-4">                </div>                            <div class="col-12 col-md-6 col-lg-4">                </div>                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo $this->BootsCakeForm->control('province_id', ['options' => $provinces, 'empty' => true, 'required' => false, 'size' => 'sm']); ?>
                </div>            </div>
    <div class="card-footer">
        <?= $this->BootsCakeForm->control(__('Guardar'), ['type' => 'submit']) ?>
    </div>
</div>
<?= $this->BootsCakeForm->end() ?>
