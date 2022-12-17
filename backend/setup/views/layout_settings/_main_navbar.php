<div class="ui two column stackable grid">
    <div class="column">
        <?= $form->field($model, 'homeButtonIcon')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'pinMainSidebar')->checkbox() ?>
        <?= $form->field($model, 'hideSearchbar')->checkbox() ?>
        <?= $form->field($model, 'hideWebsiteLink')->checkbox() ?>
        <?= $form->field($model, 'showHelpInfo')->checkbox() ?>
    </div>
    <div class="column">
        <?= $form->field($model, 'copyrightLabel')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'hideCreateMenu')->checkbox() ?>
        <?= $form->field($model, 'hideHelpMenu')->checkbox() ?>
        <?= $form->field($model, 'hideAlertMenu')->checkbox() ?>
        <?= $form->field($model, 'allowUserPreference')->checkbox() ?>
    </div>
</div>