<div class="ui two column grid">
    <div class="column">
        <?= $form->field($model, 'homePage')->textInput(['maxlength' => 140]) ?>
    </div>
    <div class="column">
        <?= $form->field($model, 'titlePrefix')->textInput(['maxlength' => 140]) ?>
    </div>
</div>