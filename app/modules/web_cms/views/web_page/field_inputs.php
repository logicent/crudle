<div class="ui padded segment">
    <div class="ui two column grid">
        <div class="ui centered row">
            <?= $form->field($model, 'published')->checkbox(['class' => 'toggle']) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'title')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'slug')->textInput(['maxlength' => 140]) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'route')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'layout')->dropDownList([]) ?>
        </div>
    </div>
    <div class="ui one column grid">
        <div class="column">
            <?= $form->field($model, 'content')->textarea([
                    'maxlength' => true,
                    'rows' => 13,
                    'style' => 'resize:none',
                ]) ?>
        </div>
    </div>
</div>