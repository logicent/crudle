<div class="ui attached padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'full_name')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'designation')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'inactive')->checkbox() ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'route')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'date_published')->textInput(['class' => 'pikaday']) ?>
        </div>
    </div>
</div>
<div class="ui attached padded segment">
    <?= $form->field($model, 'bio')->textarea([
            'maxlength' => true,
            'rows' => 6,
            'style' => 'resize:none',
        ]) ?>
</div>
