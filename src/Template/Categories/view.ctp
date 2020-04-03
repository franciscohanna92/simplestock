<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

<div class="card card-default">
    <div class="card-body p-0">
        <table class="table table-bordered">
            <tr>
                <th scope="row"><?= __('Nombre') ?></th>
                <td><?= h($category->name) ?></td>
            </tr>
        </table>
    </div>
</div>
