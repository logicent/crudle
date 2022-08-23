<?php

use crudle\app\helpers\App;
use crudle\app\setup\enums\Type_Import;
use yii\helpers\Html;
use yii\helpers\Url;
use icms\FomanticUI\modules\RadioList;
use icms\FomanticUI\modules\Select;

?>
<div class="ui padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= Html::activeHiddenInput($model, 'id') ?>
            <?= $form->field($model, 'model_name')
                    ->widget(Select::class, [
                        'items' => App::getModels(),
                        'search' => true,
                        'options' => ['required' => true]
                    ])
                    ->label('Data model')
                ?>
            <p class="text-muted">
                <?= Yii::t('app', 'To create or update records download a template for populating data.') ?>
            </p>
            <div class="field">
                <?= Html::label(Yii::t('app', 'Export type')) . RadioList::widget([
                        'items' => [
                            Yii::t('app', 'Blank template &nbsp;( with headers only )'),
                            Yii::t('app', 'Filled template &nbsp;( load existing data )')
                        ],
                        'name' => 'download_option',
                    ]) ?>
            </div>
            <!-- Recommended for inserting new records. -->
            <!-- Recommended bulk editing records via import, or understanding the import format. -->
                        <!-- Download in Excel File Format -->
            <?= Html::submitButton(Yii::t('app', 'Download') , [
                    'class' => 'compact basic ui button action',
                    'data' => [
                        'method' => 'post',
                        'url' => Url::to(['export-template'])
                    ]
                ]) ?>
        </div>
    </div>
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'import_type')
                    ->dropdownList(array_merge(['' => '&nbsp;'], Type_Import::enums()))
                    ->label('Import type') ?>
            <p class="text-muted">
                <?= Yii::t('app', 'Fill in or edit the template and save in same format before uploading it.') ?>
            </p>
            <?= $this->render('@appMain/views/_form_field/file_input_file', [
                    'fileTypes' => 'application/csv',
                    'form' => $form,
                    'model' => $model,
                    'attribute' => $model->fileAttribute,
                ]) ?>
        </div>
    </div>
</div>
<?php
if (!empty($import_errors)) :
    echo $this->render('_log');
endif;

// $this->registerJs(
//     $this->render('@appMain/views/_form/_action.js')
// );