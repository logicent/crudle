<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\modules\CheckboxList;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;
?>

<div class="ui small header" style="font-weight: 500">
    <?= Yii::t('app', 'Import Data') ?>
</div>
<p class="text-muted">
    <?= Yii::t('app', 'Fill in or edit the data template and save in downloaded format before uploading it.') ?>
</p>

<?php
 $form = ActiveForm::begin([
    'options' => [
            'class' => 'ui form',
            'enctype' => 'multipart/form-data'
        ]
    ]) ?>
    <div class="ui one column stackable grid">
        <div class="fifteen wide column">
            <?= $form
                    ->field($model, 'dataFile', [
                        'options' => ['class' => 'field', 'style' => 'margin: 0em;']
                    ])
                    ->textInput([
                        'readonly' => true,
                        // 'enableClientValidation' => false,
                        'placeholder' => Yii::t('app', 'Click here to upload')
                    ])
                    ->label('Select data file') ?>
            <?= Html::activeFileInput($model, 'dataFile', ['style' => 'display: none;']) ?>
        </div>
        <div class="column">
            <div class="field">
                <?= Html::label(Yii::t('app', 'Import to')) . CheckboxList::widget([
                        'items' => [
                            'Add new records',
                            'Update existing records',
                        ],
                        'name' => 'upload_option',
                    ]) ?>
            </div>
        </div>
        <div class="column">
            <?= Html::submitButton(Yii::t('app', 'Import') , ['class' => 'compact ui primary button']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>