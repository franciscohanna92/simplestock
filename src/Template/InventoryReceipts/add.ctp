<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InventoryReceipt $inventoryReceipt
 */
?>

<?= $this->BootsCakeForm->create($inventoryReceipt) ?>
<div class="card card-default">
    <div class="card-body row">
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('date', ['empty' => true, 'required' => false]); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('number', ['required' => false]); ?>
        </div>
        <div class="col-12">
            <?php echo $this->BootsCakeForm->control('providers_id', ['options' => $providers, 'required' => false]); ?>
        </div>
        <div class="col-12">
            <label>Artículos</label>
            <button type="button" onclick="appendArticleInput(articlesInputCount - 1, articles)">Añadir artículo</button>
                <div class="row" id="articles-input-list">

            </div>
        </div>
    </div>
    <div class="card-footer">
        <?= $this->BootsCakeForm->control(__('Guardar'), ['type' => 'submit']) ?>
    </div>
</div>
<?= $this->BootsCakeForm->end() ?>

<script>
    let articles = <?= json_encode($articles); ?>;
    let articlesInputCount = 1;
    console.log(articles);
    const articlesListElem = document.getElementById('articles-input-list');

    function appendArticleInput(index, articles) {
        articlesListElem.append(generateArticleSelectInput(index, articles));
        articlesListElem.append(generateArticleQuantityInput(index));
        articlesInputCount++;
    }

    function generateArticleSelectInput(index, articles) {
        let containerDiv = document.createElement('div');
        containerDiv.classList.add('col-6');

        let selectNode = document.createElement('select');
        selectNode.classList.add('form-control');
        selectNode.name = `articles[${index}][id]`;
        for (let id in articles) {
            let optionNode = document.createElement('option');
            optionNode.value = id;
            optionNode.innerHTML = articles[id];
            selectNode.options.add(optionNode);
        }

        containerDiv.append(selectNode);
        return containerDiv;
    }

    function generateArticleQuantityInput(index) {
        let containerDiv = document.createElement('div');
        containerDiv.classList.add('col-6');
        let inputNode = document.createElement('input');
        inputNode.name = `articles[${index}][_joinData][quantity]`;
        inputNode.type = 'number';
        inputNode.min = '0';
        containerDiv.append(inputNode);
        return containerDiv;
    }

    function generateArticlesOptionsElements(arcitles) {
        let optionsElements = '';

        return optionsElements
    }

    function deleteArticleInput() {

    }

    console.log(generateArticlesOptionsElements(articles));

</script>