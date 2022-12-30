<div class="ui padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'message')->textarea([
                    'rows' => 5, 
                    'style' => 'resize: none; height: 115px;'
                ]) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'inactive')->checkbox()->label('&nbsp;') ?>
        </div>
    </div>
</div>
