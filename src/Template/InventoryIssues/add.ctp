<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InventoryIssue $inventoryIssue
 */
?>

<section ng-controller="InventoryIssuesController as vm">
    <?= $this->BootsCakeForm->create($inventoryIssue) ?>
    <div class="card card-default">
        <div class="card-body row">
            <div class="col">
                <?php echo $this->BootsCakeForm->control('descriptive_name', ['required' => true, 'label' => 'Nombre descriptivo']); ?>
            </div>
            <div class="col">
                <?php echo $this->BootsCakeForm->control('date', ['required' => true, 'label' => 'Fecha de salida']); ?>
            </div>
            <div class="col">
                <?php echo $this->BootsCakeForm->control('building_site_id', ['options' => $buildingSites, 'required' => false, 'empty' => true, 'label' => 'Obra destino']); ?>
            </div>
            <div class="col">
                <?php echo $this->BootsCakeForm->control('employee_id', ['options' => $employees, 'required' => false, 'label' => 'Se entrega a', 'empty' => true]); ?>
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
                        <input type="number" class="form-control"
                               placeholder="Cantidad que sale"
                               max="{{vm.selectedArticles[$index].stock }}"
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
            .controller('InventoryIssuesController', InventoryIssuesController);

        InventoryIssuesController.$inject = [];

        function InventoryIssuesController() {
            let vm = this;
            vm.articles = <?= json_encode($articles); ?>;
            console.log(vm.articles)
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