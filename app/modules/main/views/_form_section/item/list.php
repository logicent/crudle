<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;
use icms\FomanticUI\helpers\Size;
use icms\FomanticUI\modules\Checkbox;
use icms\FomanticUI\modules\Modal;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\helpers\Url;

$modal = Modal::begin([
    'id' =>  $listId . '__modal',
    'size' => Size::MEDIUM,
]);
$modal::end();

$modelName = StringHelper::basename($modelClass);
$modelDetails = $this->context->getDetailModels();
if (key_exists($modelName, $modelDetails)):
    $detailModels = $modelDetails[$modelName];
endif;
$detailModelId = Inflector::variablize($modelName);
if (key_exists($detailModelId, $modelDetails)):
    $detailModels = $modelDetails[$detailModelId];
endif;
$viewPath = $this->context->viewPath;
$listColumns = $viewPath . "/$listId/list_columns.php";
$columnHeaders = require $listColumns;
$tableRowView = $viewPath . "/$listId/_row_inputs.php";
$hideSelectAllCheckbox = empty($detailModels) ? 'none' : '';
?>

<div id="<?= $listId ?>">
    <table class="in-form ui celled table">
        <thead>
            <tr style="font-size: 110%">
                <th class="center aligned select-all-rows" width="5%">
                    <?= Checkbox::widget([
                            'name' => 'select_all_rows',
                            'options' => [
                                'style' => "width: 17px; vertical-align: text-top; display: $hideSelectAllCheckbox"
                            ]
                        ]) ?>&nbsp;
                    <?= Yii::t('app', 'No.') ?>
                </th>
                <?php
                    foreach ($columnHeaders as $columnHeader) :
                        // To-Do: to be retrieved from the child list_columns view
                        $columnHeading = Inflector::camel2words(Inflector::id2camel($columnHeader['name']));
                        echo Html::tag('th', $columnHeading, ['class' => $columnHeader['width'] . ' wide']);
                    endforeach;
                ?>
                <th class="center aligned" width="5%">
                    <?= Html::a(Elements::icon('ellipsis horizontal', ['class' => 'grey', 'style' => 'margin-right: 0em']),
                                false,
                                ['class' => 'compact ui icon']) ?>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            echo $this->render('../_no_data', ['hidden' => !empty($detailModels)]);
                for ($rowId = 0; $rowId < count($detailModels); $rowId++) :
                    // echo '<pre>';print_r($detailModels[$rowId]); exit;
                    echo $this->renderFile($tableRowView, [
                            'modelClass' => $modelClass,
                            'model' => $detailModels[$rowId],
                            'rowId' => $rowId + 1 // Avoid 0 based row numbering in list
                        ]);
                endfor ?>
        </tbody>
    </table>
<?php
    echo Elements::button(Yii::t('app', 'Delete'), [
            'class' => 'compact red small del-row',
            'data' => [
            ],
            'style' => 'display : none'
        ]);
    echo Elements::button(Yii::t('app', 'Add row'), [
            // 'onclick' => <<<JS
            //     let listContainer = $(this).parent('div')
            //     let rowCount = listContainer.find('tbody > tr').not('#no_data').length
            //     let listId = listContainer.attr('id')
            //     $("[name='_row_counter']").val(rowCount)
            //     $("[name='_model_class']").val($(this).data('model-class'))
            //     $("[name='_row_inputs_view']").val(listId + '/_row_inputs')
            // JS,
            'class' => 'compact small add-row',
            'data'  => [
                'model-class' => $modelClass,
                // 'hx-get' => Url::to(['add-row']),
                // 'hx-include' => '.-htmx-value',
                // 'hx-target' => "#$listId > table > tbody",
                // 'hx-swap' => 'beforeend',
            ]
        ]) ?>
</div>
<?php
// $this->registerJs(<<<JS
    // ?? Only fires on first row of first table - needs more testing to understand
    // htmx.on('.edit-row', 'htmx:beforeRequest', (
    // $('.edit-row').on('click',
    //     function(ev){
    //         ev.stopPropagation();
    //         // e.preventDefault();
    //         let listContainer = $(this).closest('table').parent('div')
    //         let listId = listContainer.attr('id')
    //         let addRow = listContainer.find('.add-row')
    //         let rowId = $(this).closest('tr').data('row-id')
    //         $("[name='_row_counter']").val(rowId)
    //         $("[name='_model_class']").val($(addRow).data('model-class'))
    //         $("[name='_modal_form_view']").val(listId + '/field_inputs')

    //         rowValues = [];
    //         fieldValue = '';
    //         tableRow = $(this).closest('tr');
    //         rowInputs = tableRow.children('td').children('input');
    //         rowInputs.each(function(counter, element){
    //             fieldValue = { 'name': $(this).attr('name'), 'value': $(this).val() };
    //             rowValues.push(fieldValue);
    //         });

    //         rowSelects = tableRow.children('td').children('select');
    //         rowSelects.each(function(counter, element){
    //             fieldValue = { 'name': $(this).attr('name'), 'value': $(this).val() };
    //             rowValues.push(fieldValue);
    //         });
    //         $("[name='_row_values']").val(JSON.stringify(rowValues));
    //         // console.log(JSON.stringify(rowValues));
    //         return false;
    //     });
    // );

    // htmx.onLoad(function(content) {
    //     modalContainer = $(content).closest('.modal'); // ?? is this efficient and always available
    //     modalContainer.modal(
    //     {
    //         closable  : true,
    //         centered  : false,
    //         // inverted  : false,
    //     })
    //     .modal('show');
    // });

    // const modal = new bootstrap.Modal(document.getElementById("modal"))

    // htmx.on("htmx:afterSwap", (e) => {
    // // Response targeting #dialog => show the modal
    // if (e.detail.target.id == "dialog") {
    //     modal.show()
    // }
    // })

    // htmx.on("htmx:beforeSwap", (e) => {
    // // Empty response targeting #dialog => hide the modal
    // if (e.detail.target.id == "dialog" && !e.detail.xhr.response) {
    //     modal.hide()
    //     e.detail.shouldSwap = false
    // }
    // })
// JS);