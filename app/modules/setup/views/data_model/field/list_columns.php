<?php

use app\modules\setup\models\DataModelField;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use Zelenin\yii\SemanticUI\helpers\Size;
use Zelenin\yii\SemanticUI\modules\Modal;
use Zelenin\yii\SemanticUI\Elements;

?>

<p class="text-muted">
    <?= Yii::t('app', 'Setup the label, hide on print, default value, etc ...') ?>
</p>
    <?= GridView::widget([
        'layout' => "{items}\n{pager}",
        'dataProvider' => $dataProvider,
        'tableOptions'=> ['class' => 'ui celled table'],
        'emptyText' => Yii::t('app', "No fields defined."),
        'emptyTextOptions' => ['class' => 'ui small header center aligned text-muted'], 
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            // ['class' => 'Zelenin\yii\SemanticUI\widgets\CheckboxColumn'],
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'label',
                'value' => function($model, $key, $index, $column){
                            return Html::tag('div', 
                                        Html::activeTextInput($model, "[$index]label", ['data' => ['modal-input' => 'label']]),
                                        [
                                            'class' => 'ui transparent input'
                                        ]
                                    );
                        },
                'format' => 'raw'
            ],
            [
                'attribute' => 'type',
                'value' => function($model, $key, $index, $column){
                            return Html::tag('div',
                                        Html::activeDropDownList($model, "[$index]type", DataModelField::getListOptions()  , ['data' => ['modal-input' => 'type']]),
                                    ['class' => 'ui transparent input']);
                        },
                'format' => 'raw'
            ],
            [
                'attribute' => 'name',
                'value' => function($model, $key, $index, $column){
                            return Html::tag('div',
                                        Html::activeTextInput($model, "[$index]name", ['style' => 'font-weight: 500;', 'data' => ['modal-input' => 'name']]),
                                    ['class' => 'ui transparent input']);
                        },
                'format' => 'raw',
            ],
            [
                'attribute' => 'mandatory',
                'value' => function($model, $key, $index, $column){
                            return Html::activeCheckbox($model, "[$index]mandatory", ['label' => false, 'data' => ['modal-input' => 'mandatory']]);
                        },
                'format' => 'raw',
                'contentOptions' => [
                    'class' => 'center aligned'
                ]
            ],
            [
                'attribute' => 'options',
                'value' => function($model, $key, $index, $column){
                            return Html::tag('div',
                                    Html::activeTextInput($model, "[$index]options", ['data' => ['modal-input' => 'options']]),
                                ['class' => 'ui transparent input']);
                        },
                'format' => 'raw'
            ],
            [
                'format' => 'raw',
                'value' => function( $model, $key, $index, $column ) {
                    return 
                        Html::activeHiddenInput($model, "[$index]actionType",
                            [
                                'class' => 'action-type',
                                'data' => [
                                    'modal-input' => 'data_model',
                                    'action-create' => DataModelField::ACTION_TYPE_CREATE,
                                    'action-update' => DataModelField::ACTION_TYPE_UPDATE,
                                    'action-delete' => DataModelField::ACTION_TYPE_DELETE,
                                ]
                            ] ) .
                        Html::activeHiddenInput($model, "[$index]data_model", ['data' => ['modal-input' => 'data_model']]) .
                        Html::activeHiddenInput($model, "[$index]length", ['data' => ['modal-input' => 'length']]) .
                        Html::activeHiddenInput($model, "[$index]unique", ['data' => ['modal-input' => 'unique']]) .
                        Html::activeHiddenInput($model, "[$index]in_list_view", ['data' => ['modal-input' => 'in_list_view']]) .
                        Html::activeHiddenInput($model, "[$index]in_standard_filter", ['data' => ['modal-input' => 'in_standard_filter']]) .
                        Html::activeHiddenInput($model, "[$index]in_global_search", ['data' => ['modal-input' => 'in_global_search']]) .
                        Html::activeHiddenInput($model, "[$index]bold", ['data' => ['modal-input' => 'bold']]) .
                        Html::activeHiddenInput($model, "[$index]allow_in_quick_entry", ['data' => ['modal-input' => 'allow_in_quick_entry']]) .
                        Html::activeHiddenInput($model, "[$index]translatable", ['data' => ['modal-input' => 'translatable']]) .
                        Html::activeHiddenInput($model, "[$index]fetch_from", ['data' => ['modal-input' => 'fetch_from']]) .
                        Html::activeHiddenInput($model, "[$index]fetch_if_empty", ['data' => ['modal-input' => 'fetch_if_empty']]) .
                        Html::activeHiddenInput($model, "[$index]depends_on", ['data' => ['modal-input' => 'depends_on']]) .
                        Html::activeHiddenInput($model, "[$index]ignore_user_permissions", ['data' => ['modal-input' => 'ignore_user_permissions']]) .
                        Html::activeHiddenInput($model, "[$index]allow_on_submit", ['data' => ['modal-input' => 'allow_on_submit']]) .
                        Html::activeHiddenInput($model, "[$index]report_hide", ['data' => ['modal-input' => 'report_hide']]) .
                        Html::activeHiddenInput($model, "[$index]perm_level", ['data' => ['modal-input' => 'perm_level']]) .
                        Html::activeHiddenInput($model, "[$index]hidden", ['data' => ['modal-input' => 'hidden']]) .
                        Html::activeHiddenInput($model, "[$index]readonly", ['data' => ['modal-input' => 'readonly']]) .
                        Html::activeHiddenInput($model, "[$index]mandatory_depends_on", ['data' => ['modal-input' => 'mandatory_depends_on']]) .
                        Html::activeHiddenInput($model, "[$index]readonly_depends_on", ['data' => ['modal-input' => 'readonly_depends_on']]) .
                        Html::activeHiddenInput($model, "[$index]default", ['data' => ['modal-input' => 'default']]) .
                        Html::activeHiddenInput($model, "[$index]description", ['data' => ['modal-input' => 'description']]) .
                        Html::activeHiddenInput($model, "[$index]in_filter", ['data' => ['modal-input' => 'in_filter']]) .
                        Html::activeHiddenInput($model, "[$index]print_hide", ['data' => ['modal-input' => 'print_hide']]) .
                        Html::activeHiddenInput($model, "[$index]print_width", ['data' => ['modal-input' => 'print_width']]) .
                        Html::activeHiddenInput($model, "[$index]width", ['data' => ['modal-input' => ']width']]);
                },
                'headerOptions' => [
                    'style' => 'display: none'
                ],
                'contentOptions' => [
                    'style' => 'display: none'
                ]
            ],
            [
                'class' => 'Zelenin\yii\SemanticUI\widgets\ActionColumn',
                'buttons' => [
                    'view' => function ( $url, $model, $key ) 
                    {
                        return false;
                    },
                    'delete' => function ( $url, $model, $key ) 
                    {
                        return false;
                    },
                    'update' => function ( $url, $model, $key ) 
                    {
                        return 
                            Html::a(Elements::icon('pencil alternate'), ['data-model-field/update'],
                                    [
                                        'class' => 'ui button load-field-modal',
                                        'title' => Yii::t('yii', 'Update'),
                                    ]);
                    },
                ],
            ],
        ],
    ]); ?>
    <br>
<?php
$isReadonly = $this->context->isReadonly();
if ( !$isReadonly ) :
    echo
    Html::button(Yii::t('app', 'Delete'), 
        [
            'class' => 'delete-button compact ui tiny red button', 
            'style' => 'display:none',
            'data' => [
                ''
            ]
        ]) .
    Html::submitButton(Yii::t('app', 'Add row'), [
        'class' => 'compact ui tiny button',
        'name' => 'addRow',
    ]);
endif;

$modal = Modal::begin([
    'id' => 'field_modal',
    'size' => Size::MEDIUM,
]);
// echo $this->render('_form', [
//     'model' => new DataModelField(),
// ]);
$modal::end();

$this->registerJs(<<<JS
    $('.load-field-modal').on('click', function(e)
    {
        e.stopPropagation(); // !! DO NOT use return false; it stops execution
        rowInputs = $(e.target).closest('tr').find(":input" );
        $.each(rowInputs, (index, input) => {
            $(input).attr('name', $(input).data('modal-input'));
            // console.log(input);
        });

        $.ajax({
            url: $(this).attr('href'),
            type: 'post',
            data: {
                _csrf: yii.getCsrfToken(),
                'data': rowInputs.serializeArray(),
            },
            success: function( response )
            {
                $('#field_modal .content').html( response );
                $('#field_modal').modal({ closable : false })
                                .modal('show'); // !!! Use the modal#id not '.ui.modal' to avoid load issues
            },
            error: function( jqXhr, textStatus, errorThrown )
            {
                console.log( errorThrown );
            }
        });
        return false;
    })
JS); ?>

<?php $this->registerJs(<<<JS
    $('.delete-button').click(
        function()
        {
            var detail = $(this).closest('tr');
            var actionType = detail.find('.action-type');

            if (actionType.val() ===  actionType.data('action-update') ) 
            {
                //marking the row for deletion
                actionType.val( actionType.data('action-delete'));
                detail.hide();
            }
            else
             {
                //if the row is a new row, delete the row
                detail.remove();
            }
        }
    );
JS);
?>