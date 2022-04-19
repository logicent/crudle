<?php

use app\assets\DirrtyAsset;
use app\helpers\StatusMarker;
use crudle\main\enums\Resource_Action;
use crudle\main\enums\Type_View;
use crudle\main\models\base\BaseActiveRecord;
use crudle\setup\enums\Status_Transaction;
use crudle\setup\enums\Type_Permission;
use yii\helpers\Html;
use yii\helpers\Url;
use Zelenin\yii\SemanticUI\Elements;


$controller = $this->context;

if ($controller->layout !== 'print') :
    DirrtyAsset::register($this);
endif;
?>

<div id="page_head" class="ui attached menu text">
    <div class="ui grid container">
        <div class="ten wide column view-header">
            <div class="ui floated header">
                <?= Html::encode($this->title) ?>
                <?php
                    if ($controller->action->id == 'read' ||
                        $controller->action->id == 'update') :
                        $status = $this->context->model->getStatusAttribute();
                        echo Html::tag('small',
                            StatusMarker::icon('check circle', $this->context->model, $status) . StatusMarker::label($this->context->model, $status), [
                                'style' => 'font-weight: 400; margin-left: 0.75em;',
                            ]);
                    endif ?>
            </div>
        </div>
        <div class="six wide column right aligned">
        <?php
            // all multiple record views like list and image view
            if ($controller->currentViewType() == Type_View::List) :
                echo $this->render('_view_type');
                echo Html::a(Elements::icon('refresh'), ['refresh'], [
                        'id' => 'refresh_btn',
                        'class' => 'compact ui basic icon button',
                    ]) .
                    Html::tag('span', '&nbsp;') .
                    Html::a(Yii::t('app', 'Show filters'), false, [ // zoom, Elements::icon('toggle off')
                        'id' => 'show_filters',
                        'class' => 'compact ui filter button',
                    ]) .
                    Html::a(Yii::t('app', 'Hide filters'), false, [ // zoom out, Elements::icon('toggle on')
                        'id' => 'hide_filters',
                        'class' => 'compact ui filter button',
                        'style' => 'display: none'
                    ]);
                echo $this->render('@app_main/views/_list/_menu');

                if ( Yii::$app->user->can(Type_Permission::Create .' '. $controller->viewName()) ) :
                    echo Html::a(Yii::t('app', 'New'), ['create'], [
                            'id' => 'create_btn',
                            'class' => 'compact ui primary button',
                            'data' => [
                                'load-modal' => isset($this->context->model->source) ? 'true' : 'false'
                            ]
                        ]);
                endif;

                if ( Yii::$app->user->can(Type_Permission::Delete .' '. $controller->viewName()) ) :
                    echo Html::a(Yii::t('app', 'Delete'), ['delete-multiple'], [
                        'id' => 'delete_btn',
                        'class' => 'compact ui primary button',
                        'data' => [
                            // remove if custom modal works or use return false to override confirm dialog
                            'confirm' => Yii::t('app', 'Confirm you want to delete the selected rows?'),
                            'method' => 'post',
                        ],
                        'style' => 'display: none'
                    ]);
                endif;
            endif;
            // form view i.e. new or update record and setting form
            if ($controller->currentViewType() == Type_View::Form) : ?>
                <!-- If form is dirty !!! then show reminder to save -->
                <span class="app-status-label app-hidden">
                    <i class="ui mini yellow empty circular label"></i>
                    &ensp;<?= Yii::t('app', 'Not saved') ?>&ensp;
                </span>
            <?php
                if (is_a($this->context->model, BaseActiveRecord::class)) :
                    if (!$this->context->model->isNewRecord &&
                        $this->context->model->hasWorkflow() &&
                        $this->context->model->status === Status_Transaction::Draft) :
                            echo Html::button(Yii::t('app', 'Submit'), [
                                'class' => 'compact ui primary button',
                                'id'    => 'submit_btn',
                                'data' => ['url' => Url::to(['submit', 'id' => $this->context->model->id])]
                            ]);
                    endif;
                    if ($this->context->model->lockUpdate() &&
                        $this->context->model->userCan( Type_Permission::Cancel, Yii::$app->user->id ) &&
                        $this->context->model->status == Status_Transaction::Submitted
                    ) :
                        echo Html::a(Yii::t('app', 'Cancel'),
                                    ['cancel', 'id' => $this->context->model->id],
                                    [
                                        'class' => 'compact ui button',
                                        'data' => [
                                            'method' => 'post',
                                            'confirm' => Yii::t('app', 'Are you sure you want to Cancel?')
                                        ]
                                    ]
                                );
                    endif;
                    if (! $this->context->model->isNewRecord) :
                        echo Html::a(Elements::icon('left chevron'),
                                    ['previous', 'id' => $this->context->model->id],
                                    [
                                        'class' => 'compact ui basic icon button',
                                        'title' => 'Previous',
                                    ]);
                        echo Html::a(Elements::icon('right chevron'),
                                    ['next', 'id' => $this->context->model->id],
                                    [
                                        'class' => 'compact ui basic icon button',
                                        'title' => 'Next',
                                    ]);
                        if ($this->context->model->allowPrint()) :
                            echo Html::a(Elements::icon('print', ['class' => 'grey']),
                                        ['print-preview', 'id' => $this->context->model->id],
                                        [
                                            'data' => ['method' => 'post'],
                                            'target' => '_blank',
                                        ]);
                        endif;
                    endif;
                    $display = $this->context->model->isNewRecord || !$this->context->model->hasWorkflow() ? '' : 'none';
                    echo Html::button(Yii::t('app', 'Save'), [
                            'class' => 'compact ui primary button',
                            'style' => "display: $display",
                            'id'    => 'save_btn',
                        ]);
                    if (!$this->context->model->isNewRecord && $this->context->model->hasWorkflow()) :
                        echo $this->render('@app_main/views/_form/_menu', ['model' => $this->context->model]);
                    endif;
                else : // non-CRUD forms
                    echo Html::button(Yii::t('app', 'Save'), [
                            'class' => 'compact ui primary button',
                            'id'    => 'save_btn',
                        ]);
                endif;
            endif ?>
        </div>
    </div>
</div>

<?php
if ($controller->action->id == Resource_Action::Create ||
    $controller->action->id == Resource_Action::Update) :
        $this->registerJs(<<<JS
            $('.ui.form').dirrty({
                preventLeaving : false,
                // leavingMessage: 'Your unsaved changes will be lost', // ignored by browser and overridden
            }).on('dirty',
                function() {
                    $('.app-status-label').toggleClass('app-hidden');
                    // switch primary action button
                    if ($('#submit_btn').length == 1) {
                        $('#save_btn').show();
                        $('#submit_btn').hide();
                    }
            }).on('clean',
                function() {
                    $('.app-status-label').toggleClass('app-hidden');
                    // switch primary action button
                    if ($('#submit_btn').length == 1) {
                        $('#submit_btn').show();
                        $('#save_btn').hide();
                    }
            });
        JS);
endif;
echo $this->render('@app_main/views/_form/_confirm', ['action' => Status_Transaction::Submit]);
echo $this->render('@app_main/views/_list/_delete');

$this->registerJs(<<<JS
    $('.ui.dropdown').dropdown();

    $('#save_btn').on('click', function(e) {
        $('.ui.form button[type="submit"]').click();
    });

    $('#submit_btn').on('click', function(e) {
        url = $(this).data('url');
        confirmAction(url);
        return false; // this prevents the browser dialog from being loaded.
    });

    $('#delete_btn').on('click', function(e) {
        // keys is an array of the keys from the selected rows
        keys = $('.grid-view').yiiGridView('getSelectedRows');
        id_list = JSON.stringify(keys);
        delete_url = $(this).attr('href');
        data = {'id_list': id_list};
        confirmDelete(delete_url, data);
        return false; // this prevents the browser dialog from being loaded.
    });

    if (window.location.search) {
        $('.filters').show();

        $('#hide_filters').show();
        $('#show_filters').hide();
    }

    $('.filter.button').on('click', function(e) 
    {
        $('.filters').toggle();

        if (e.target.id == 'show_filters') {
            $(this).hide();
            $('#hide_filters').show();
        }
        if (e.target.id == 'hide_filters') {
            $(this).hide();
            $('#show_filters').show();
        }
    });
JS) ?>
