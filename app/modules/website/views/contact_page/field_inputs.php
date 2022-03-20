<div class="ui attached padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'pageTitle')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'forwardToEmail')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'hideContactForm')->checkbox() ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'heading')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'subheading')->textInput(['maxlength' => 140]) ?>
        </div>
    </div>
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'shortIntro')->textarea([
                    'maxlength' => true,
                    'rows' => 6,
                    'style' => 'resize:none',
                ]) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'enquiryDetail')->textarea([
                    'maxlength' => true,
                    'rows' => 6,
                    'style' => 'resize:none',
                ]) ?>
        </div>
</div>
