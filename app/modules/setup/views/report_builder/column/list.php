<?php

use app\modules\main\enums\Type_Model;
use app\modules\setup\models\ReportBuilderItem;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\helpers\Size;
use Zelenin\yii\SemanticUI\modules\Checkbox;
use Zelenin\yii\SemanticUI\modules\Modal;


$modal = Modal::begin([
    'id' => 'item__modal',
    'size' => Size::MEDIUM,
]);
$modal::end();
?>

<div class="ui secondary attached segment centered sub header">
    <?= Yii::t('app', 'Attributes') ?>
</div>
<div class="ui attached padded segment">
    <table id="_column" class="in-form ui celled table">
        <thead>
            <tr>
        <?php 
            if ($this->context->action->id == 'create' || $this->context->action->id == 'update') : ?>
                <th class="one wide center aligned select-all-rows">
                    <?= Checkbox::widget(['name' => 'select_all_rows', 'labelOptions' => ['label' => false]]) ?>
                </th>
        <?php
            endif ?>
                <th class="five wide"><?= Yii::t('app', 'Attribute name') ?></th>
                <th class="three wide"><?= Yii::t('app', 'Sort by') ?></th>
                <th class="three wide"><?= Yii::t('app', 'Sort order') ?></th>
                <th class="three wide"><?= Yii::t('app', 'Filter by') ?></th>
                <th class="one wide"></th>
            </tr>
        </thead>
        <tbody>
        <?php
            if ($model->isCopyRecord) :
                // $columnModelClass = StringHelper::basename($this->context->columnModelClass);
                // foreach ($model->copyDetailModels[$columnModelClass] as $id => $detailModel) :
                //     echo $this->render('_form', [
                //                         'model' => $detailModel,
                //                         'rowId' => $id
                //                     ]);
                // endforeach;
            elseif (!empty($model->reportBuilderItems)) :
                foreach ($model->reportBuilderItems as $id => $column)
                    echo $this->render('_form', [
                                        'model' => $column,
                                        'rowId' => $id
                                    ]);
            else : // $model->isNewRecord
                echo $this->render('@app_main/views/_form_section/_no_data');
            endif ?>
        </tbody>
    </table>
    <?= Elements::button('Delete', ['class' => 'compact red mini del-row', 'style' => 'display : none']) ?>
    <?= Elements::button('Add Row', [
            'class' => 'compact tiny add-row',
            'data'  => [
                'url' => Url::to(['add-item']),
                'model-class' => $this->context->modelClass() . 'Item',
                'form-view' => 'column/_form',
            ]
        ]) ?>
</div>

<?php
$this->registerJs(<<<JS
$('.add-row').on('click', function(e)
{
    e.stopPropagation(); // !! DO NOT use return false; it stops execution
    rowCount = $('#_column tbody > tr').length;

    $.ajax({
        url: $(this).data('url'),
        type: 'get',
        data: {
            'modelClass': $(this).data('model-class'),
            'itemModelClass': $('#rb__model_name').val(),
            'formView': $(this).data('form-view'),
            'nextRowId': rowCount + 1,
        },
        success: function( response )
        {
            $('#_column #no_data').hide();
            $('#_column tbody:last-child').append( response );
        },
        error: function( jqXhr, textStatus, errorThrown )
        {
            console.log( errorThrown );
        }
    });
});

$('.edit-column--btn').on('click',
    function (e) {
        el_edit_btn = $(this);

        $.ajax({
            url: $(this).data('url'),
            type: 'get',
            data: {
                'modelClass': $(this).data('model-class'),
                'modelId': $(this).data('model-id'),
                'formView': $(this).data('form-view'),
            },
            success: function( response )
            {
                $('#item__modal .content').html( response ); // Target '.content' to keep close button in modal
                $('#item__modal').modal({ 
                                        centered: false,
                                        closable : false 
                                    })
                                    .modal('show'); // !!! Use the modal#id not '.ui.modal' to avoid load issues
            },
            error: function( jqXhr, textStatus, errorThrown )
            {
                console.log( errorThrown );
            }
        });

        return false;
    });

$( '#_column tbody' ).on('click', 'a.del-row', function(e)
{
    actionType_el = $(this).siblings('input');
    if (actionType_el.val() == 'Update')
    {
        actionType_el.val('Delete'); // mark for deletion
        $(this).closest('tr').hide();
    }
    else { // 'Create'
        $(this).closest('tr').remove();
    }

    rows = $('#_column tbody > tr').not('#no_data');
    if (rows.length == 0)
        $('#_column #no_data').show();
    else
        $('#_column #no_data').hide();

});
JS)
?>