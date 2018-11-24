<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>

<?= $this->BootsCakeForm->create($employee) ?>

<div class="card card-default">
    <div class="card-body">
            <?php
                    echo $this->BootsCakeForm->control('name', ['required' => false]);
                    echo $this->BootsCakeForm->control('surname', ['required' => false]);
                    echo $this->BootsCakeForm->control('cuil', ['required' => false]);
                    echo $this->BootsCakeForm->control('phone', ['required' => false]);
                    echo $this->BootsCakeForm->control('email', ['required' => false]);
                    echo $this->BootsCakeForm->control('address', ['required' => false]);
                    echo $this->BootsCakeForm->control('position', ['required' => false]);
                    echo $this->BootsCakeForm->control('observations', ['required' => false]);
                echo $this->BootsCakeForm->control('company_id', ['options' => $companies, 'required' => false]);
            ?>
    </div>
    <div class="card-footer">
        <?= $this->BootsCakeForm->control(__('Guardar'), ['type' => 'submit', 'size' => 'lg']) ?>
    </div>
</div>
<?= $this->BootsCakeForm->end() ?>
