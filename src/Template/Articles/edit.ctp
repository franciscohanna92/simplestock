<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>

<?= $this->BootsCakeForm->create($article) ?>

<div class="card card-default">
    <div class="card-body">
            <?php
                                            echo $this->BootsCakeForm->control('name', ['required' => false]);
                            echo $this->BootsCakeForm->control('description', ['required' => false]);
                            echo $this->BootsCakeForm->control('security_stock', ['required' => false]);
                            echo $this->BootsCakeForm->control('internal_code', ['required' => false]);
                            echo $this->BootsCakeForm->control('provider_code', ['required' => false]);
                                echo $this->BootsCakeForm->control('cateogry_id', ['options' => $categories, 'required' => false]);
                                echo $this->BootsCakeForm->control('provider_id', ['options' => $providers, 'required' => false]);
                                echo $this->BootsCakeForm->control('company_id', ['options' => $companies, 'required' => false]);
                        echo $this->BootsCakeForm->control('inventory_issues._ids', ['options' => $inventoryIssues, 'required' => false]);
                        echo $this->BootsCakeForm->control('inventory_receipts._ids', ['options' => $inventoryReceipts, 'required' => false]);
                        echo $this->BootsCakeForm->control('purchase_orders._ids', ['options' => $purchaseOrders, 'required' => false]);
                            ?>
    </div>
    <div class="card-footer">
        <?= $this->BootsCakeForm->control(__('Guardar'), ['type' => 'submit']) ?>
    </div>
</div>
<?= $this->BootsCakeForm->end() ?>
