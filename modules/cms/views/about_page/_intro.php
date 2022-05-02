<div class="ui one column grid">
    <div class="eight wide column">
        <?= $form->field($model, 'pageTitle')->textInput(['maxlength' => 140]) ?>
    </div>
    <div class="column">
        <?= $form->field($model, 'ourIntro')->textarea([
                'maxlength' => true,
                'rows' => 6,
                'style' => 'resize:none',
            ]) ?>
    </div>
</div>