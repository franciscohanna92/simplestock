<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InventoryReceipt $inventoryReceipt
 */
?>

<section ng-controller="InventoryReceiptsController as vm">
    <?= $this->BootsCakeForm->create($inventoryReceipt) ?>
    <div class="card card-default">
        <div class="card-body row">
            <div class="col">
                <?php echo $this->BootsCakeForm->control('descriptive_name', ['required' => true, 'label' => 'Nombre descriptivo']); ?>
            </div>
            <div class="col">
                <label for="date">Fecha (mes, día, año)</label>
                <input type="date" class="form-control" name="date" id="date" required>
            </div>

            <div class="col-12 mt-4">
                <div class="mb-2">
                    <label class="mr-3">Artículos</label>
                    <button type="button"
                            class="btn btn-primary btn-sm"
                            ng-click="vm.articlesInput.push(articlesInput.length)">
                        Añadir artículo
                    </button>
                </div>
                <div class="d-flex flex-row mb-1" ng-repeat="articleInput in vm.articlesInput track by $index">
                    <div class="align-bottom mr-3">
                        <button type="button"
                                class="btn btn-danger"
                                ng-click="vm.removeArticleInput($index)">
                            <strong>X</strong>
                        </button>
                    </div>
                    <select class="form-control flex-grow-1 mr-3"
                            ng-change="vm.selectArticle()"
                            name="articles[{{$index}}][id]"
                            ng-options="article as article.name for article in vm.articles track by article.id"
                            ng-model="vm.selectedArticles[$index]"
                            required>
                    </select>
                    <div class="input-group flex-grow-1">
                        <input type="text" class="form-control"
                               placeholder="Cantidad que ingresa"
                               name="articles[{{$index}}][_joinData][quantity]"
                               required>
                        <div class="input-group-append">
                            <span class="input-group-text py-0">{{vm.selectedArticles[$index].unit.abbreviation}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <?= $this->BootsCakeForm->control(__('Guardar'), ['type' => 'submit']) ?>
        </div>

    </div>
    <?= $this->BootsCakeForm->end() ?>
</section>

<script>
    (function () {
        angular
            .module('simplestock')
            .controller('InventoryReceiptsController', InventoryReceiptsController);

        InventoryReceiptsController.$inject = [];

        function InventoryReceiptsController() {
            let vm = this;
            vm.articles = <?= json_encode($articles); ?>;
            vm.articlesInput = [1];
            vm.selectedArticles = [];

            vm.$onInit = onInit;
            vm.removeArticleInput = removeArticleInput;

            function onInit() {
                vm.selectedArticles.push(vm.articles[0])
            }

            function removeArticleInput(index) {
                vm.articlesInput.splice(index - 1, 1);
                vm.selectedArticles.splice(index, 1)
            }
        }
    })();
</script>