<?php

use crudle\app\main\enums\Type_Field_Input;
use crudle\app\setup\models\DataModelField;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\Json;
use icms\FomanticUI\helpers\Size;
use icms\FomanticUI\modules\Modal;
use icms\FomanticUI\Elements;
use icms\FomanticUI\modules\Checkbox;
use icms\FomanticUI\modules\Select;
use crudle\app\assets\Sortablejs;

Sortablejs::register($this);
?>

<p class="text-muted">
    <?= Yii::t('app', 'Setup the label, hide on print, default value, etc ...') ?>
</p>
    <?= GridView::widget([
        'layout' => "{items}\n{pager}",
        'dataProvider' => $dataProvider,
        'tableOptions'=> [
            'class' => 'ui celled compact table in-form sortable',
            // 'data' => ['hx-post' => Url::to(['re-index-field-list']), 'hx-trigger' => 'end']
        ],
        'emptyText' => Yii::t('app', "No fields defined."),
        'emptyTextOptions' => ['class' => 'ui small header center aligned text-muted'], 
        'rowOptions' => function ( $model, $key, $index, $grid ) {
            return ['id' => $index];
        },
        'columns' => [
            [
                'class' => 'icms\FomanticUI\widgets\CheckboxColumn',
                'checkboxOptions' => function ($model, $key, $index, $column) {
                    return [
                        // 'class' => 'select-row',
                        'id' => $index,
                        'value' => Json::encode($key),
                    ];
                },
                'headerOptions' => ['class' => 'center aligned select-row'],
                'contentOptions' => ['class' => 'center aligned select-row']
            ],
            ['class' => 'yii\grid\SerialColumn', 'contentOptions' => ['class' => 'center aligned']],
            [
                'attribute' => 'label',
                'value' => function($model, $key, $index, $column){
                            return 
                                Html::tag('div', 
                                    Html::activeTextInput($model, "[$index]label", [
                                        'data' => ['modal-input' => 'label']
                                    ]), [
                                        'class' => 'ui transparent input'
                                    ]
                                );
                        },
                'format' => 'raw'
            ],
            [
                'attribute' => 'field_type',
                'value' => function($model, $key, $index, $column){
                    return Html::tag('div',
                        Select::widget(
                            [
                                'model' => $model,
                                'attribute' => "[$index]field_type",
                                'items' => Type_Field_Input::enums(),
                                'search' => true,
                                'options' => [
                                    'data' => ['modal-input' => 'field_type'],
                                    // 'style' => 'border: none; box-shadow: none;'
                                ]
                            ]
                        ),
                        ['class' => 'ui transparent input']
                    );
                },
                'format' => 'raw',
                'contentOptions' => ['class' => 'select-field-type']
            ],
            [
                'attribute' => 'field_name',
                'value' => function($model, $key, $index, $column){
                        return Html::tag('div',
                                Html::activeTextInput($model, "[$index]field_name", [
                                    'style' => 'font-weight: 500;',
                                    'data' => ['modal-input' => 'field_name']
                                ]),
                            ['class' => 'ui transparent input']);
                    },
                'format' => 'raw',
            ],
            [
                'attribute' => 'mandatory',
                'value' => function($model, $key, $index, $column) {
                    return 
                        Checkbox::widget([
                            'model' => $model,
                            'attribute' => "[$index]mandatory",
                            'labelOptions' => ['label' => false],
                            'inputOptions' => [
                                'data' => ['modal-input' => 'mandatory'],
                            ],
                            'options' => [
                                'style' => 'width: 17px;'
                            ]
                        ]);
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
                                    Html::activeTextarea($model, "[$index]options", [
                                        'data' => ['modal-input' => 'options'],
                                        'rows' => 1,
                                        'style' => 'font-size: 14px; max-height: 120px; min-height: 40px'
                                    ]),
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
                                    'modal-input' => 'model_name',
                                    'action-create' => DataModelField::ACTION_TYPE_CREATE,
                                    'action-update' => DataModelField::ACTION_TYPE_UPDATE,
                                    'action-delete' => DataModelField::ACTION_TYPE_DELETE,
                                ]
                            ] ) .
                        Html::activeHiddenInput($model, "[$index]id", ['data' => ['modal-input' => 'id']]) .
                        Html::activeHiddenInput($model, "[$index]model_name", ['data' => ['modal-input' => 'model_name']]) .
                        Html::activeHiddenInput($model, "[$index]col_index", ['data' => ['modal-input' => 'col_index']]) .
                        Html::activeHiddenInput($model, "[$index]col_side", ['data' => ['modal-input' => 'col_side']]) .
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
                        Html::activeHiddenInput($model, "[$index]width", ['data' => ['modal-input' => 'width']]);
                },
                'headerOptions' => [
                    'style' => 'display: none'
                ],
                'contentOptions' => [
                    'style' => 'display: none'
                ]
            ],
            [
                'class' => 'icms\FomanticUI\widgets\ActionColumn',
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
                            Elements::button(Elements::icon('pencil alternate'),
                            [
                                'class' => 'compact basic icon edit-row',
                                'data' => [
                                    'url' => Url::to(['edit-row', 'id' => $model->id]),
                                    'model-class' => get_class($model),
                                    'model-id' => $model->id,
                                    'form-view' => 'field/field_inputs',
                                ]
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
    'options' => ['class' => 'data-field--modal'],
    'size' => Size::MEDIUM,
]);
// load fields here
$modal::end();

$this->registerJs(<<<JS
$('table.in-form').on('click', '.edit-row',
    function (e) {
        edit_btn = $(this);
        table_row = edit_btn.closest('tr');
        row_fields = [];
        row_inputs = table_row.find('[data-modal-input]');
        row_inputs.each(function() {
            switch (this.type) {
                case 'checkbox':
                    if (this.checked == false)
                        value = '0';
                    else
                        value = $(this).val();
                    break;
                default: // input, textarea, select-one
                    value = $(this).val();
            }
            field = { 'name': $(this).data('modal-input'), 'value': value};
            row_fields.push(field);
        });

        $.ajax({
            url: $(this).data('url'),
            type: 'get',
            data: {
                'modelClass': $(this).data('model-class'),
                'editView': $(this).data('form-view'),
                'rowData': row_fields,
                'rowId': table_row.attr('id'),
            },
            success: function( response )
            {
                $('.data-field--modal' + ' .content').html( response ); // Target '.content' to keep close button in modal
                $('.data-field--modal').modal({
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

$('.ui.modals').on('click', '.update-row',
    function (e) {
        update_btn = $(this);
        table_row = $('#' + update_btn.data('row-id'));
        form_inputs = $('.modal-form').find('[data-modal-input]');
        form_inputs.each(function() {
            row_input = table_row.find('[data-modal-input="' + $(this).data('modal-input') + '"]');
            switch (this.type) {
                case 'checkbox':
                    if (this.checked) // true
                        row_input.prop('checked', true);
                    else
                        row_input.prop('checked', false);
                    break;
                case 'select-one':
                    $(row_input).dropdown({selected: $(this).val()});
                    // break;
                default: // input, textarea, select-one
                    row_input.val($(this).val());
            }
        });
        // close the modal form
        $('.data-field--modal').modal('hide');
    });

    htmx.onLoad(function(content) {
        var sortables = content.querySelectorAll(".sortable > tbody");
        for (var i = 0; i < sortables.length; i++) {
        var sortable = sortables[i];
        new Sortable(sortable, {
            animation: 150,
            ghostClass: 'blue-background-class'
        });
        }
    });
JS);
?>
