<?php

use yii\helpers\Html;

?>

<div class="ui padded segment">
    <div class="two fields">
        <?= Html::activeHiddenInput($model, 'organization_id', [
                'value' => $model->isNewRecord ? Yii::$app->user->identity->person->organization_id : $model->organization_id,
        ]) ?>
        <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
    </div>
    <?= $form->field($model, 'inactive', ['hintOptions' => ['tag' => 'small', 'class' => 'text-muted']])
            ->checkbox(['class' => 'toggle'])
            ->hint('<br>' . Yii::t('app', 'i.e. hide this report template from list options in selection fields')) ?>
    <div class="two fields">
        <?= $form->field($model, 'type')->dropDownList([]) ?>
    </div>
    <?= $form->field($model, 'description')->textarea(['style' => 'resize: none; height: 115px']) ?>
</div>
<!-- TODO: Use in page form to populate the detail table see Activity locations -->
<?= $this->render('report_template_item/index', ['form' => $form, 'model' => $model]); ?>
