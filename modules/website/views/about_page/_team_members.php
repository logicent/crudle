<?php

use website\models\AboutTeamMember;
use yii\helpers\Html;

?>
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

<div class="ui hidden divider"></div>

<?= $this->render('@app_main/views/_form_section/item', [
        'model' => new AboutTeamMember(),
        'detailModels' => $this->context->getDetailModels()['teamMember'],
        'form' => $form,
        'formView' => '@app_website/views/about_page/team_member/field_inputs',
        'listColumns' => '@app_website/views/about_page/team_member/list_columns',
        'listId' => 'team_member',
    ]) ?>

<?= Html::activeHiddenInput($model, "photoImage", ['data' => ['name' => 'photoImage']]) ?>

<div class="ui hidden divider"></div>

<div class="ui one column grid">
    <div class="column">
    <!-- To-Do: use @app_main/views/rich_text_editor -->
    <?= $form->field($model, 'footer')->textarea([
            'maxlength' => true,
            'rows' => 9,
            'style' => 'resize:none',
        ]) ?>
    </div>
</div>
