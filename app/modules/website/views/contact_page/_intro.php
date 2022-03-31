<div class="ui two column grid">
    <div class="column">
        <?php //= $form->field($model, 'pageTitle')->textInput(['maxlength' => 140]) ?>
        <?= $form->field($model, 'forwardToEmail')->textInput(['maxlength' => 140]) ?>
        <?= $form->field($model, 'heading')->textInput(['maxlength' => 140]) ?>
        <?php //= $form->field($model, 'subheading')->textInput(['maxlength' => 140]) ?>
    </div>
    <div class="column">
        <?= $form->field($model, 'hideContactForm')->checkbox()->label('&nbsp;') ?>
    </div>
</div>
<div class="ui one column grid">
    <div class="column">
        <?= $form->field($model, 'shortIntro')->textarea([
                'maxlength' => true,
                'rows' => 6,
                'style' => 'resize:none',
            ]) ?>
    </div>
</div>