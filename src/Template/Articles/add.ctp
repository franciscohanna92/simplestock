<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>

<?= $this->BootsCakeForm->create($article) ?>

<div class="card card-default">
    <div class="card-body row">
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('name', ['required' => false]); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('description', ['required' => false]); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('security_stock', ['required' => false]); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('stock', ['required' => false]); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('internal_code', ['required' => false]); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('provider_code', ['required' => false]); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('cateogry_id', ['options' => $categories, 'required' => false]); ?>
        </div>
        <!--<div class="col-12">
            <?php /*echo $this->BootsCakeForm->control('provider_id', ['options' => $providers, 'empty' => true, 'required' => false, 'size' => 'sm']); */?>
        </div>-->
    </div>
    <div class="card-footer">
        <?= $this->BootsCakeForm->control(__('Guardar'), ['type' => 'submit']) ?>
    </div>
</div>
<?= $this->BootsCakeForm->end() ?>
