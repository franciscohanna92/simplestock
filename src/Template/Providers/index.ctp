<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Provider[]|\Cake\Collection\CollectionInterface $providers
 */
?>

<style>
    .form-control:focus {
        border-color: #dde6e9;
    }
</style>

<div class="card card-default">
        <div class="card card-header m-0">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <form class="m-0" action="/providers" method="get">
                    <div class="input-group">
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
                        <?php if($searchQuery != ''): ?>
                        <div class="input-group-append">
                            <a href="/providers" class="bg-white input-group-text px-2 py-0">
                                <span style="line-height: 33px;" class="text-primary">✕</span>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            <div class="col-12 offset-md-4 col-md-4 offset-lg-6 col-lg-3">
                <a href="/providers/add" class="btn btn-primary h-100 float-right">
                    Agregar nuevo provider
                </a>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                                                <th scope="col"><?= $this->Paginator->sort('id', '#') ?></th>

                                                <th scope="col"><?= $this->Paginator->sort('name') ?></th>

                                                <th scope="col"><?= $this->Paginator->sort('address') ?></th>

                                                <th scope="col"><?= $this->Paginator->sort('website') ?></th>

                                                <th scope="col"><?= $this->Paginator->sort('email') ?></th>

                                                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>

                                                <th scope="col"><?= $this->Paginator->sort('cuit') ?></th>

                                                <th scope="col"><?= $this->Paginator->sort('city_id') ?></th>

                    

                    

                    

                    

                    

                                                <th scope="col"><?= $this->Paginator->sort('province_id') ?></th>

                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($providers as $provider): ?>
                <tr>
                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($provider->id) ?></td>
                                                                                                                                                                                                                                                                                                                                    <td><?= h($provider->name) ?></td>
                                                                                                                                                                                                                                                                                                                                    <td><?= h($provider->address) ?></td>
                                                                                                                                                                                                                                                                                                                                    <td><?= h($provider->website) ?></td>
                                                                                                                                                                                                                                                                                                                                    <td><?= h($provider->email) ?></td>
                                                                                                                                                                                                                                                                                                                                    <td><?= h($provider->phone) ?></td>
                                                                                                                                                                                                                                                                                                                                    <td><?= h($provider->cuit) ?></td>
                                                                                                                                                                                                                                                <td><?= $provider->has('city') ?
                                        $this->Html->link($provider
                                        ->city->name, ['controller' =>
                                        'Cities', 'action' => 'view', $provider
                                        ->city
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                                                                                                                                                                                                                                <td><?= $provider->has('province') ?
                                        $this->Html->link($provider
                                        ->province->name, ['controller' =>
                                        'Provinces', 'action' => 'view', $provider
                                        ->province
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $provider->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $provider->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $provider->id], ['confirm' =>
                        __('¿Seguro quieres eliminar este provider?')]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(count($providers) == 0): ?>
                <tr>
                    <td class="text-center text-muted" colspan="14">No hay registros para mostrar</td>
                </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if(count($providers) > 0): ?>
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
                <?php echo $this->Paginator->counter( 'Mostrando {{current}} filas de {{count}}' ); ?>
            </span>
        </p>
    </div>
    <?php endif; ?>
</div>
