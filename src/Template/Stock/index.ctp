<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[]|\Cake\Collection\CollectionInterface $articles
 */
?>

<div class="card card-default">
    <div class="card card-header m-0">
        <div class="row">
            <div class="col">
                <form class="d-flex m-0" action="/stock" method="get">
                    <div class="input-group col">
                        <div class="border-right-0 input-group-prepend">
                            <span class="input-group-text bg-white border-right-0 input-group-text pr-0 pl-2">
                                <i class="fa fa-search text-muted"></i>
                            </span>
                        </div>
                        <input class="form-control border-left-0 <?= $searchQuery != '' ? 'border-right-0' : '' ?>"
                               type="text"
                               name="searchQuery"
                               placeholder="Buscar..."
                               value="<?= $searchQuery; ?>"
                               required>
                        <?php if ($searchQuery != ''): ?>
                            <div class="input-group-append">
                                <a href="/stock" class="bg-white input-group-text px-2 py-0">
                                    <span style="line-height: 33px;" class="text-primary">✕</span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <label for="lowStockOnly" class="m-0 align-middle mt-2">
                        <input onchange="this.form.submit()"
                               type="checkbox"
                               name="lowStockOnly"
                            <?php if($lowStockOnly):?>
                                checked
                            <?php endif; ?>
                               id="lowStockOnly">
                        Mostrar solo stock bajo
                    </label>
                </form>
            </div>

            <?php if ($this->Roles->deny($authUser['role'], ['COMPRAS', 'ADMIN'])): ?>
            <div class="col">
                <a href="/articles/add" class="btn btn-primary h-100 float-right">
                    Agregar nuevo artículo
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id', '#') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('name', 'Nombre') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('stock', 'Stock actual') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('security_stock', 'Stock seguridad') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($articles as $article): ?>
                    <tr class="<?= $article->stock < $article->security_stock ? 'table-danger' : '' ?>">
                        <td><?= $this->Number->format($article->id) ?></td>
                        <td><?= h($article->name) ?> (<?= $article['category']['name'] ?>)</td>
                        <td><?= $this->Number->format($article->stock) ?> <?= $article->has('unit') ? $article->unit['abbreviation'] : ''?></td>
                        <td><?= $this->Number->format($article->security_stock) ?> <?= $article->has('unit') ? $article->unit['abbreviation'] : ''?></td>
                    </tr>
                <?php endforeach; ?>
                <?php if (count($articles) == 0): ?>
                    <tr>
                        <td class="text-center text-muted" colspan="14">No hay registros para mostrar</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if (count($articles) > 0): ?>
        <div class="card-footer d-flex justify-content-between">
            <nav>
                <ul class="pagination">
                    <?php
                    echo $this->BootsCakePaginator->first();
                    echo $this->BootsCakePaginator->prev();
                    echo $this->BootsCakePaginator->numbers();
                    echo $this->BootsCakePaginator->next();
                    echo $this->BootsCakePaginator->last();
                    ?>
                </ul>
            </nav>

            <p style="line-height: 35px;">
            <span>
                <?php echo $this->Paginator->counter('Mostrando {{current}} filas de {{count}}'); ?>
            </span>
            </p>
        </div>
    <?php endif; ?>
</div>
