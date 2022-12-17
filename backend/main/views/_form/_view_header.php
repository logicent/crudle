<?php

use crudle\app\main\enums\Type_View;
use crudle\app\crud\models\ActiveRecord;
use crudle\app\setup\enums\Status_Transaction;
use crudle\app\user\enums\Type_Permission;
use yii\helpers\Html;
use yii\helpers\Url;
use icms\FomanticUI\Elements;

?>

<!-- If form is dirty !!! then show reminder to save -->
<span class="app-status-label app-hidden">
    <i class="ui mini yellow empty circular label"></i>
    &ensp;<?= Yii::t('app', 'Not saved') ?>&ensp;
</span>

<?php
$controller = $this->context;
$model = $this->context->getModel();

if (is_a($model, ActiveRecord::class)) :
    if (!$model->isNewRecord &&
        $model->hasWorkflow() &&
        $model->status === Status_Transaction::Draft) :
            echo Html::button(Yii::t('app', 'Submit'), [
                'class' => 'compact ui primary button',
                'id'    => 'submit_btn',
                'data' => ['url' => Url::to(['submit', 'id' => $model->id])]
            ]);
    endif;
    if ($model->lockUpdate() &&
        $model->status == Status_Transaction::Submitted &&
        $model->userCan( Type_Permission::Cancel, Yii::$app->user->id )
    ) :
        echo Html::a(Yii::t('app', 'Cancel'),
                    ['cancel', 'id' => $model->id],
                    [
                        'class' => 'compact ui button',
                        'data' => [
                            'method' => 'post',
                            'confirm' => Yii::t('app', 'Are you sure you want to Cancel?')
                        ]
                    ]
                );
    endif;
    if (! $model->isNewRecord) :
        echo Html::a(Elements::icon('left chevron'),
                    ['previous', 'id' => $model->id],
                    [
                        'class' => 'compact ui icon button',
                        'title' => Yii::t('app', 'Previous'),
                    ]);
        echo Html::a(Elements::icon('right chevron'),
                    ['next', 'id' => $model->id],
                    [
                        'class' => 'compact ui icon button',
                        'title' => Yii::t('app', 'Next'),
                    ]);
        if ($model->allowPrint()) :
            echo Html::a(Elements::icon('print', ['class' => 'grey']),
                        ['print-preview', 'id' => $model->id],
                        [
                            'data' => ['method' => 'post'],
                            'target' => '_blank',
                        ]);
        endif;
    endif;
    $display = $model->isNewRecord || !$model->hasWorkflow() ? '' : 'none';
    echo Html::button(Yii::t('app', 'Save'), [
            'class' => 'compact ui primary button',
            'style' => "display: $display",
            'id'    => 'save_btn',
        ]);
    if (!$model->isNewRecord && $model->hasWorkflow()) :
        echo $this->render('@appMain/views/_form/_menu', ['model' => $model]);
    endif;
else : // non-CRUD forms
    echo Html::button(Yii::t('app', 'Save'), [
            'class' => 'compact ui primary button',
            'id'    => 'save_btn',
        ]);
endif;

if ($controller->mapActionViewType() == Type_View::Form) :
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

$this->registerJs(<<<JS
    $('#save_btn').on('click', function(e) {
        $('.ui.form button[type="submit"]').click();
    });

    $('#submit_btn').on('click', function(e) {
        url = $(this).data('url');
        confirmAction(url);
        return false; // this prevents the browser dialog from being loaded.
    });
JS) ?>