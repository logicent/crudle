<div class="ui attached padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'iconPath')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'iconColor')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'group')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'visible')->checkbox() ?>
        </div>
    </div>
</div>