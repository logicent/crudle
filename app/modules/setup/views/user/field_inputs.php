<?php

use app\modules\setup\enums\Type_Role;
use app\modules\setup\enums\User_Group;
use app\enums\Status_Work;
use app\models\auth\Role;
use app\helpers\SelectableItems;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\MaskedInput;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\helpers\Size;
use Zelenin\yii\SemanticUI\modules\Modal;

// $rolesCount = !empty($person->user_role) ? count($person->user_role) : '0';
$isReadonly = $this->context->isReadonly || $this->context->action->id == 'print-preview';

$form = ActiveForm::begin([
    'enableClientValidation' => false,
    'options' => [
        'enctype' => 'multipart/form-data',
        'class' => 'ui form',
        'autocomplete' => 'off'
    ]
]);

echo $this->render('/_form/_header', ['model' => $person]);
echo $this->render('_stats', ['person' => $person]) ?>

<div class="ui attached padded segment">
<?= Html::activeFileInput( $person->uploadForm, 'file_upload', [
        'accept' => 'image/*', 'style' => 'display: none'
    ]) ?>
<?= Html::activeHiddenInput( $person, 'avatar', ['id' => 'file_path', 'readonly' => true]) ?>
<?= Html::activeHiddenInput( $person, 'status' ) ?>

    <div class="two fields">
        <?= $form->field($auth, 'status')->checkbox([
                'class' => $isReadonly || 
                (
                    !Yii::$app->user->can(Type_Role::SystemManager) &&
                    !Yii::$app->user->can(Type_Role::Administrator)
                ) ? 'read-only' : ''
            ]) ?>
        <div class="field">
        <?php
            if ($auth->isNewRecord) :
                echo $form->field($auth, 'password')->passwordInput(['maxlength' => true]);
            else :
                echo Elements::button(Yii::t('app', 'Change password'), [
                        'id' => 'load-changepwd-modal', 
                        'class' => 'compact ui basic right floated small button',
                        'data' => [
                            'url' => Url::to(['people/change-pwd', 'id' => $auth->id])
                        ]
                    ]);
            endif ?>
        </div>
    </div>

    <div class="two fields">
        <?= $form->field($person, 'firstname')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
        <?= $form->field($person, 'surname')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
    </div>

    <div class="two fields">
        <?= $form->field($person, 'sex')->dropDownList([
                'M' => Yii::t('app', 'Male'),
                'F' => Yii::t('app', 'Female')
            ],
            [
                'prompt' => '',
                'disabled' => $isReadonly
            ]) ?>
        <?= $form->field($person, 'title_of_courtesy')->dropDownList(
            [],
            ['disabled' => $isReadonly]
        ) ?>
    </div>

    <div class="two fields">
        <?= $form->field($person, 'mobile_no')->widget(MaskedInput::class, [
                    'mask' => ['0799 999 999', '01199 999 999'],
                    'options' => ['readonly' => $isReadonly]
            ]) ?>
        <?= $form->field($person, 'personal_email')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
    </div>
</div>

<div class="ui attached padded segment">
<?php
    if ($auth->isNewRecord) :
        echo $form->field($auth, 'send_welcome_email')->checkbox();
    endif ?>
    <div class="two fields">
        <div class="eight wide field">
        <?php
            if (Yii::$app->user->can(Type_Role::SystemManager) || Yii::$app->user->can(Type_Role::Administrator)) :
                echo $form->field($auth, 'username')->textInput(['maxlength' => true, 'readonly' => $isReadonly]);
            else :
                echo $form->field($auth, 'username')->textInput(['readonly' => true]);
            endif ?>
        </div>
        <div class="eight wide field">
            <?= $form->field($auth, 'email')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
        </div>
    </div><!-- ./two fields -->

    <div class="two fields">
        <div class="eight wide field">
            <?= $form->field($person, 'user_group')->dropDownList(
                User_Group::enums(), [
                    'prompt' => '',
                    'disabled' => $isReadonly || !Yii::$app->user->can(Type_Role::SystemManager)
                ]) ?>
        </div>
        <div class="field">
        <?= $form->field($person, 'official_status')->dropDownList(Status_Work::enums(), [
                    'prompt' => '',
                    'disabled' => $isReadonly
                ]) ?>
        </div>
    </div><!-- ./two fields -->

    <div class="two fields">
        <?= $form->field($person, 'user_role')
                ->checkboxList(SelectableItems::get( Role::class, $person, [
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
            //     $person->getAttributeLabel('user_role') .'&nbsp;('.
            //     Html::tag('span', $rolesCount,
            //             [
            //                 'class' => 'selected-list-options',
            //                 'data' => ['count' => $rolesCount]
            //             ]) . ')'
            // ) ?>
    </div>
</div>

<div class="ui attached padded segment">
    <?= $form->field($person, 'notes')->textarea([
            'rows' => 3,
            'readonly' => $isReadonly,
            'style' => 'resize: none'
        ]) ?>
</div>
<?php //= $this->render('_user_log', ['model' => $person->userLog]) ?>

<?php ActiveForm::end(); ?>

<?= $this->render('/_form/_footer', ['model' => $person]) ?>

<!-- Change pwd modal here -->
<?php
$modal = Modal::begin([
    'id' => 'change_pwd',
    'size' => Size::SMALL,
]);
$modal::end();

$this->registerJs(<<<JS
    $('#person-firstname').on('change', function (e) {
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
