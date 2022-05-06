<?php

use crudle\app\setup\enums\Type_Role;
use crudle\app\setup\enums\Status_Work;
use crudle\app\main\models\auth\Role;
use crudle\app\helpers\SelectableItems;
use crudle\app\setup\models\UserGroup;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\MaskedInput;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\helpers\Size;
use Zelenin\yii\SemanticUI\modules\Modal;

$this->title = $model->full_name;

// $rolesCount = !empty($model->user_role) ? count($model->user_role) : '0';
$isReadonly = $this->context->isReadonly() || $this->context->action->id == 'print-preview';

echo $this->render('_stats', ['model' => $model]) ?>

<div class="ui attached padded segment">
<?= Html::activeFileInput( $model->uploadForm, 'file_upload', [
        'accept' => 'image/*', 'style' => 'display: none'
    ]) ?>
<?= Html::activeHiddenInput( $model, 'avatar', ['id' => 'file_path', 'readonly' => true]) ?>
<?= Html::activeHiddenInput( $model, 'status' ) ?>

    <div class="two fields">
        <?= $form->field($this->context->auth, 'status')->checkbox([
                'class' => $isReadonly || 
                (
                    !Yii::$app->user->can(Type_Role::SystemManager) &&
                    !Yii::$app->user->can(Type_Role::Administrator)
                ) ? 'read-only' : ''
            ]) ?>
        <div class="field">
        <?php
            if ($this->context->auth->isNewRecord) :
                echo $form->field($this->context->auth, 'password')->passwordInput(['maxlength' => true]);
            else :
                echo Elements::button(Yii::t('app', 'Change password'), [
                        'id' => 'load-changepwd-modal', 
                        'class' => 'compact ui basic right floated small button',
                        'data' => [
                            'url' => Url::to(['user/change-pwd', 'id' => $this->context->auth->id])
                        ]
                    ]);
            endif ?>
        </div>
    </div>

    <div class="two fields">
        <?= $form->field($model, 'firstname')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
        <?= $form->field($model, 'surname')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
    </div>

    <div class="two fields">
        <?= $form->field($model, 'sex')->dropDownList([
                'M' => Yii::t('app', 'Male'),
                'F' => Yii::t('app', 'Female')
            ],
            [
                'prompt' => '',
                'disabled' => $isReadonly
            ]) ?>
        <?= $form->field($model, 'title_of_courtesy')->dropDownList(
            [],
            ['disabled' => $isReadonly]
        ) ?>
    </div>

    <div class="two fields">
        <?= $form->field($model, 'mobile_no')->widget(MaskedInput::class, [
                    'mask' => ['0799 999 999', '01199 999 999'],
                    'options' => ['readonly' => $isReadonly]
            ]) ?>
        <?= $form->field($model, 'personal_email')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
    </div>
</div>

<div class="ui attached padded segment">
<?php
    if ($this->context->auth->isNewRecord) :
        echo $form->field($this->context->auth, 'send_welcome_email')->checkbox();
    endif ?>
    <div class="two fields">
        <div class="eight wide field">
        <?php
            if (Yii::$app->user->can(Type_Role::SystemManager) || Yii::$app->user->can(Type_Role::Administrator)) :
                echo $form->field($this->context->auth, 'username')->textInput(['maxlength' => true, 'readonly' => $isReadonly]);
            else :
                echo $form->field($this->context->auth, 'username')->textInput(['readonly' => true]);
            endif ?>
        </div>
        <div class="eight wide field">
            <?= $form->field($this->context->auth, 'email')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
        </div>
    </div><!-- ./two fields -->

    <div class="two fields">
        <div class="eight wide field">
            <?= $form->field($model, 'user_group')->dropDownList(
                UserGroup::enums(), [
                    'prompt' => '',
                    'disabled' => $isReadonly || !Yii::$app->user->can(Type_Role::SystemManager)
                ]) ?>
        </div>
        <div class="field">
        <?= $form->field($model, 'official_status')->dropDownList(Status_Work::enums(), [
                    'prompt' => '',
                    'disabled' => $isReadonly
                ]) ?>
        </div>
    </div><!-- ./two fields -->

    <div class="two fields">
        <?= $form->field($model, 'user_role')
                ->checkboxList(SelectableItems::get( Role::class, $model, [
                        'keyAttribute' => 'name',
                        'valueAttribute' => 'name',
                        'addEmptyFirstItem' => false,
                        'filters' => [
                            'type' => 1,
                            'name' => ['<>', 'name', Type_Role::Administrator]
                        ]
                    ]),
                    [
                        'class' => $isReadonly ? 'disabled custom-listbox' : 'custom-listbox', // for container styles
                    ]
                )
            // ->label(
            //     $model->getAttributeLabel('user_role') .'&nbsp;('.
            //     Html::tag('span', $rolesCount,
            //             [
            //                 'class' => 'selected-list-options',
            //                 'data' => ['count' => $rolesCount]
            //             ]) . ')'
            // ) ?>
    </div>
</div>

<div class="ui attached padded segment">
    <?= $form->field($model, 'notes')->textarea([
            'rows' => 3,
            'readonly' => $isReadonly,
            'style' => 'resize: none'
        ]) ?>
</div>
<?php //= $this->render('_user_log', ['model' => $model->userLog]) ?>

<!-- Change pwd modal here -->
<?php
$modal = Modal::begin([
    'id' => 'change_pwd',
    'size' => Size::SMALL,
]);
$modal::end();

$this->registerJs(<<<JS
    $('#model-firstname').on('change', function (e) {
        $('#auth-username').val($(this).val())
    });

    $('#load-changepwd-modal').on('click', function(e)
    {
        e.stopPropagation(); // !! DO NOT use return false; it stops execution
        
        $.ajax({
            url: $(this).data('url'),
            type: 'post',
            data: {
                 _csrf: yii.getCsrfToken(),
            },
            success: function( response )
            {
                $('#change_pwd .content').html( response ); // Target '.content' to keep close button in modal
                $('#change_pwd').modal({ centered : false })
                                      .modal('show'); // !!! Use the modal#id not '.ui.modal' to avoid load issues
            },
            error: function( jqXhr, textStatus, errorThrown )
            {
                console.log( errorThrown );
            }
        });
        // return false;
    });

    $('.custom-listbox').on('click', function() {
        count = 0;
        items = $(this).find('.ui.checkbox');
        items.each(function(i) {
            item = $(this).find('input');
            if (item.prop('checked')) // == true
                count += 1;
        });
        selectedCount = $(this).siblings('label').children('span.selected-list-options');
        selectedCount.text(count);
    });
JS
) ?>