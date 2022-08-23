<?php

use yii\helpers\Html;
use crudle\app\assets\Dirrty;
use crudle\app\main\enums\Type_Form_View;
use crudle\app\setup\enums\Type_Role;
use icms\FomanticUI\Elements;

Dirrty::register($this);

?>

<div id="modal_header" class="ui small header">
    <div class="ui two column grid">
        <div class="ten wide column">
            <div class="ui floated header">
                <?= Html::encode($this->title) ?>
            </div>
        </div>
        <div class="six wide column right aligned">
            <span class="app-status-label app-hidden">
                <i class="ui mini yellow empty circular label"></i>&ensp;<?= Yii::t('app', 'Not Saved') ?>&ensp;
            </span>
        <?php
            if ( $this->context->formViewType() == Type_Form_View::Multiple ) :
                echo Html::a( Elements::icon('arrow up') . Yii::t('app', 'Back'),
                            ['/' . $this->context->module->id . '/' . $this->context->id . '/index'],
                            ['class' => 'compact ui button show-list-form']);
                $this->registerJs( $this->render( '@appSetup/views/_list/_form.js' ) );
            endif;
            if ( $this->context->formViewType() == Type_Form_View::Single
                || ($this->context->formViewType() == Type_Form_View::Multiple &&
                    Yii::$app->user->can('Update ' . $this->context->viewName()))
                || $this->context->id == 'role' && Yii::$app->user->can(Type_Role::SystemManager)
            ) :
                echo Html::submitButton(Yii::t('app', 'Save'), ['class' => 'compact ui primary button']);
            endif ?>
        </div><!-- ./column right aligned -->
    </div><!-- ./two column grid -->
</div><!-- ./ui top segment -->

<?php
$this->render('@appMain/views/_layouts/_flash_message', ['context' => $this->context]);

if ( $this->context->action->id != 'read') :
    $this->registerJs(<<<JS
        $('.ui.form').dirrty({
            preventLeaving : false,
            // leavingMessage: 'Your unsaved changes will be lost', // ignored by browser and overridden
        }).on('dirty',
            function() {
                $('.app-status-label').toggleClass('app-hidden');
        }).on('clean',
            function() {
                $('.app-status-label').toggleClass('app-hidden');
        });
    JS);
endif;

$this->registerJs(<<<JS
    $('.ui.dropdown').dropdown({
        // action: 'hide',
        // onChange: function(value, text, selectedItem) {
        //     console.log(value, text. selectedItem)
        // }
        // clearable : true,
        // values : listOptions, // get values from JS global var of listOptions
        // placeholder : 'Choose',
    });

    // $('.pikaday').flatpickr({
        // minDate : null,
        // maxDate : null,
        // altInput : true,
        // allowInput : false,
        // clickOpens : true,
        // shorthandCurrentMonth : false,
        // time_24hr : false
        // weekNumbers : false
    // });

    // $('.pikadaytime').flatpickr({
    //     minuteIncrement: 15,
    //     enableTime: true
    // });
JS)
?>
