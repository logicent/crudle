<div class="ui attached padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'slug')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'published')->checkbox() ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'route')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'layout')->dropDownList([]) ?>
            <?= $form->field($model, 'date_published')->textInput(['class' => 'pikaday']) ?>
        </div>
    </div>
    <?= $form->field($model, 'description')->textarea([
            'maxlength' => true,
            'rows' => 6,
            'style' => 'resize:none',
        ]) ?>
    <?= $form->field($model, 'tags')->textarea([
            'maxlength' => true,
            'rows' => 2,
            'style' => 'resize:none',
        ]) ?>
