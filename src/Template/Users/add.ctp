<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?= $this->BootsCakeForm->create($user) ?>

<div class="card card-default">
    <div class="card-body row">
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('email', ['empty' => true, 'required' => true, 'label' => 'Email']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('password', ['empty' => true, 'required' => true, 'label' => 'Contraseña']); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('role', ['empty' => true, 'options' => $roles, 'required' => true]); ?>
        </div>
    </div>
    <div class="card-footer">
        <?= $this->BootsCakeForm->control(__('Guardar'), ['type' => 'submit']) ?>
    </div>
</div>
<?= $this->BootsCakeForm->end() ?>
