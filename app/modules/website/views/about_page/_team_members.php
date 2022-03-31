<div class="ui two column grid">
    <div class="column">
        <?= $form->field($model, 'ourTeamHeading')->textInput(['maxlength' => 140]) ?>
        <?= $form->field($model, 'ourTeamSubheading')->textInput(['maxlength' => 140]) ?>
    </div>
    <div class="column">
        <?= $form->field($model, 'hideTeamSection')->checkbox()->label('&nbsp;') ?>
    </div>
</div>

<div class="ui two column grid">
    <div class="column">
        <?= $form->field($model, 'showTeamMemberBio')->checkbox() ?>
    </div>
</div>

<div class="ui one column grid">
    <div class="column">
    <!-- To-Do: use //_form_field/rich_text_editor -->
    <?= $form->field($model, 'footer')->textarea([
            'maxlength' => true,
            'rows' => 9,
            'style' => 'resize:none',
        ]) ?>
    </div>
</div>