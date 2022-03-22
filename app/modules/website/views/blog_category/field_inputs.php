<div class="ui attached padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'slug')->textInput(['maxlength' => 140]) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'route')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'layout')->dropDownList([]) ?>
        </div>
    </div>
    <div class="ui one column grid">
        <div class="column">
            <?= $form->field($model, 'description')->textarea([
                    'maxlength' => true,
                    'rows' => 5,
                    'style' => 'resize:none',
                ]) ?>
        </div>
    </div>
</div>