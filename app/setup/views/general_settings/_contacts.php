<div class="ui two column grid">
    <div class="column">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'location')->textarea(['rows' => 4]) ?>
    </div>
    <div class="column">
        <?= $form->field($model, 'shortName')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'contacts')->textarea(['rows' => 4]) ?>
    </div>
</div>