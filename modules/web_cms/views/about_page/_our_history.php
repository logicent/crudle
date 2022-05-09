<div class="ui one column grid">
    <div class="eight wide column">
        <?= $form->field($model, 'ourHistoryHeading')->textInput(['maxlength' => 140]) ?>
    </div>
    <div class="column">
        <?= $form->field($model, 'ourHistory')->textarea([
                'maxlength' => true,
                'rows' => 10,
                'style' => 'resize:none',
            ]) ?>
    </div>
</div>