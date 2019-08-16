<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InventoryReceipt $inventoryReceipt
 */
?>

<?= $this->BootsCakeForm->create($inventoryReceipt) ?>
<div class="card card-default">
    <div class="card-body row">

        <div class="col">
            <?php echo $this->BootsCakeForm->control('number', ['required' => false, 'label' => 'Nº entrada']); ?>
        </div>
        <div class="col">
            <label for="date">Fecha (mes, día, año)</label>
            <input type="date" class="form-control" name="date" id="date">
        </div>

        <div class="col-12">
            <hr>
            <div class="mb-2">
                <label class="mr-3">Artículos</label>
                <button type="button" class="btn btn-primary btn-sm"
                        onclick="appendArticleInput(articlesInputCount - 1, articles)">Añadir artículo
                </button>
            </div>
            <div class="row" id="articles-input-list"></div>
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
        let columnDiv = document.createElement('div');
        columnDiv.classList.add('col-6');

        let selectNode = document.createElement('select');
        selectNode.classList.add('form-control');
        selectNode.name = `articles[${index}][id]`;
        for (let i = 0; i < articles.length; i++) {
            let article = articles[i];
            let optionNode = document.createElement('option');
            optionNode.value = article.id;
            optionNode.innerHTML = `${article.name} (${article.hasOwnProperty('unit') ? article.unit.name : 'N/A'})`;
            selectNode.options.add(optionNode);
        }

        columnDiv.append(selectNode);
        return columnDiv;
    }

    function generateArticleQuantityInput(index) {
        let containerDiv = document.createElement('div');
        containerDiv.classList.add('col-6');
        let inputNode = document.createElement('input');
        inputNode.name = `articles[${index}][_joinData][quantity]`;
        inputNode.type = 'number';
        inputNode.min = '0';
        inputNode.classList.add('form-control');
        inputNode.placeholder = 'Cantidad que ingresa';
        containerDiv.append(inputNode);
        return containerDiv;
    }

    appendArticleInput(0, articles);

</script>