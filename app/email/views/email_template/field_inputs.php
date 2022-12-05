<div class="ui padded segment">
    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'message')->textarea([
            'rows' => 5, 
            'style' => 'resize: none; height: 115px;'
        ]) ?>
    <?= $form->field($model, 'inactive')->checkbox() ?>
</div>
