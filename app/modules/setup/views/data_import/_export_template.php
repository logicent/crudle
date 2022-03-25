<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\modules\RadioList;
use Zelenin\yii\SemanticUI\modules\Select;

?>

<div class="ui small header" style="font-weight: 500">
    <?= Yii::t('app', 'Export Template') ?>
</div>
<p class="text-muted">
    <?= Yii::t('app', 'To create or update records you must first download the data template for importing.') ?>
</p>

<?= Html::beginForm(['export-template'], 'post', ['class' => 'ui form']); ?>
    <div class="ui one column stackable grid">
        <div class="column">
            <div class="field">
                <?= Html::label('Select data model') ?>
                <?= Select::widget([
                        'name' => 'source_table_name',
                        'items' => $model->getListOptions(),
                        'search' => true,
                        'options' => ['required' => true]
                    ]) ?>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <?= Html::label(Yii::t('app', 'Export as')) . RadioList::widget([
                        'items' => [
                            Yii::t('app', 'Blank template &nbsp;( with headers only )'),
                            Yii::t('app', 'Filled template &nbsp;( load existing data )')
                        ],
                        'name' => 'download_option',
                    ]) ?>
            </div>
        </div>
    <!-- Recommended for inserting new records. -->
    <!-- Recommended bulk editing records via import, or understanding the import format. -->
    <div class="column">
        <!-- Download in Excel File Format -->
        <?= Html::submitButton(Yii::t('app', 'Export') , ['class' => 'compact ui button']) ?>
    </div>
</div>
<?= Html::endForm() ?>