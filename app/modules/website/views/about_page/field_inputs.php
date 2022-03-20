<div class="ui attached padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'pageTitle')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'hideTeamSection')->checkbox() ?>
            <?= $form->field($model, 'showTeamMemberBio')->checkbox() ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'ourTeamHeading')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'ourTeamSubheading')->textInput(['maxlength' => 140]) ?>
        </div>
    </div>
    <?= $form->field($model, 'ourIntro')->textarea([
            'maxlength' => true,
            'rows' => 3,
            'style' => 'resize:none',
        ]) ?>
    <?= $form->field($model, 'ourHistory')->textarea([
            'maxlength' => true,
            'rows' => 6,
            'style' => 'resize:none',
        ]) ?>
</div>
