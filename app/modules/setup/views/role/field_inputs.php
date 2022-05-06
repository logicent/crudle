<?php

use crudle\app\setup\enums\Type_Role;
use yii\helpers\Html;

?>
<div class="ui attached padded segment">
    <?= Html::activeHiddenInput($model, 'type') ?>
    <div class="two fields">
        <div class="field">
            <?= $form->field($model, 'name')->textarea([
                    'maxlength' => true, 
                    'rows' => 3, 
                    'style' => 'resize:none',
                    'readonly' => $model->name == Type_Role::SystemManager || $model->name == Type_Role::Administrator
                ]) ?>
        </div>
        <div class="field">
            <?= $form->field($model, 'description')->textarea(['rows' => 3, 'style' => 'resize:none']) ?>
        </div>
    </div>
</div>

<div class="ui attached secondary segment sub header center aligned text-muted">
    <?= Yii::t('app', 'Permissions') ?>
</div>

<div id="permissions" class="ui bottom attached padded segment">
    <?= $this->render( '_permission/list', ['model' => $model] ) ?>
</div>
<?php $this->registerJs(
<<<JS
    $('#select-all').on('click',
        function (e) {
            e.preventDefault();
            $('.role-permission > input').each(
                function() {
                    $(this).prop('checked', true)
                }
            )
        });
        $('#clear-all').on('click',
        function (e) {
            e.preventDefault();
            $('.role-permission > input').each(
                function() {
                    $(this).prop('checked', false)
                }
            )
        });
    JS);