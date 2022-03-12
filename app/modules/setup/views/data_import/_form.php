<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\modules\RadioList;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

?>

<div class="ui attached padded segment">
    <div class="ui small header" style="font-weight: 500">
        <?= Yii::t('app', 'Export Template') ?>
    </div>
    <p class="text-muted">
        <?= Yii::t('app', 'To create or update records you must first download the data template for importing.') ?>
    </p>

    <?= Html::beginForm(['export-template'], 'post', ['class' => 'ui form']); ?>
        <div class="ui one column stackable grid">
            <div class="six wide column">
                <?= Html::label('Select data model') ?>
                <?= Html::dropDownList('source_table_name', '', $model->getListOptions(), ['required' => true]) ?>
            </div>
            <div class="column">
                <?= Html::label(Yii::t('app', 'Export as')) . RadioList::widget([
                        'items' => [
                            Yii::t('app', 'Blank template (with headers only)'),
                            Yii::t('app', 'Filled template (load existing data)')
                        ],
                        'name' => 'download_option',
                    ]) ?>
            </div>
        <!-- Recommended for inserting new records. -->
        <!-- Recommended bulk editing records via import, or understanding the import format. -->
        <div class="column">
            <!-- Download in Excel File Format -->
            <?= Html::submitButton(Yii::t('app', 'Export') , ['class' => 'compact ui primary button']) ?>
        </div>
    </div>
    <?= Html::endForm(); ?>
</div>
<div class="ui bottom attached padded segment">
    <div class="ui small header" style="font-weight: 500">
        <?= Yii::t('app', 'Import Data') ?>
    </div>
    <p class="text-muted">
        <?= Yii::t('app', 'Fill in or edit the data template and save in downloaded format before uploading it.') ?>
    </p>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="ui one column stackable grid">
            <div class="column">
                <?= $form->field($model, 'dataFile')->fileInput(['style' => 'width: 100%; height: 30px;'])
                        ->label('Select data file') ?>
            </div>
            <div class="column">
                <?php /*= Html::label(Yii::t('app', 'Data operation')) . CheckboxList::widget([
                        'items' => [
                            $form->field($model, 'addNewRecords')->checkbox(false),
                            $form->field($model, 'updateRecords')->checkbox()
                        ],
                        'name' => 'upload_option',
                    ]) */?>
                <?= Html::label('Import to') ?>
                <?= $form->field($model, 'addNewRecords')->checkbox(['style' => 'margin-bottom: 0.85em;']) ?>
                <?= $form->field($model, 'updateRecords')->checkbox() ?>
            </div>
            <div class="column">
                <?= Html::submitButton(Yii::t('app', 'Import') , ['class' => 'compact ui primary button']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
<?php 
if (!empty($import_errors)) :
    echo $this->render('_log');
endif ?>
