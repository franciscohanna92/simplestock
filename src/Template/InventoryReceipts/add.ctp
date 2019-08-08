<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InventoryReceipt $inventoryReceipt
 */
?>

<?= $this->BootsCakeForm->create($inventoryReceipt) ?>

<div class="card card-default">
    <div class="card-body row">
                                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo   $this->BootsCakeForm->control('date', ['empty' => true, 'required' => false]); ?>
                </div>                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo   $this->BootsCakeForm->control('number', ['required' => false]); ?>
                </div>                            <div class="col-12 col-md-6 col-lg-4">                            <?php echo  $this->BootsCakeForm->control('providers_id', ['options' => $providers, 'required' => false]); ?>
                </div>                                        <div class="col-12 col-md-6 col-lg-4">                </div>                            <div class="col-12 col-md-6 col-lg-4">                </div>                            <div class="col-12 col-md-6 col-lg-4">                </div>                            <div class="col-12 col-md-6 col-lg-4">                </div>                <?php echo   $this->BootsCakeForm->control('articles._ids', ['options' => $articles, 'required' => false]); ?>
                    </div>
    <div class="card-footer">
        <?= $this->BootsCakeForm->control(__('Guardar'), ['type' => 'submit']) ?>
    </div>
</div>
<?= $this->BootsCakeForm->end() ?>
