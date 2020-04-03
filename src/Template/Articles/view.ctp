<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>

<div class="card card-default">
    <div class="card-body p-0">
        <table class="table table-bordered">
            <tr>
                <th scope="row"><?= __('Nombre') ?></th>
                <td><?= h($article->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Descripción') ?></th>
                <td><?= h($article->description) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Código interno') ?></th>
                <td><?= h($article->internal_code) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Código proveedor') ?></th>
                <td><?= h($article->provider_code) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Categoría') ?></th>
                <td><?= $article->has('category') ? $this->Html->link($article
                        ->category->name, ['controller' =>
                        'Categories', 'action' => 'view', $article->category
                        ->id]) : '' ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Stock de seguridad') ?></th>
                <td><?= $this->Number->format($article->security_stock) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Stock') ?></th>
                <td><?= $this->Number->format($article->stock) ?></td>
            </tr>
        </table>
    </div>
</div>
