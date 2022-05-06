<?php

use crudle\kit\generators\model\Generator;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $generator crudle\kit\generators\model\Generator */
?>

<div class="ui attached padded segment">
    <div class="ui small header" style="font-weight: 500;">
        <?= Yii::t('app', 'Database Schema') ?>
    </div>
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($generator, 'tableName')->textInput(['table_prefix' => $generator->getTablePrefix()]) ?>
            <?= $form->field($generator, 'useTablePrefix')->checkbox() ?>
        </div>
        <div class="column">
            <?= $form->field($generator, 'db') ?>
            <?= $form->field($generator, 'useSchemaName')->checkbox() ?>
        </div>
    </div>
</div>
<div class="ui attached padded segment">
    <div class="ui small header" style="font-weight: 500;">
        <?= Yii::t('app', 'Model') ?>
    </div>
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($generator, 'modelClass') ?>
            <?= $form->field($generator, 'standardizeCapitals')->checkbox() ?>
        </div>
        <div class="column">
            <?= $form->field($generator, 'ns') ?>
            <?= $form->field($generator, 'baseModelClass') ?>
        </div>
    </div>
</div>
<div class="ui attached padded segment">
    <div class="ui small header" style="font-weight: 500;">
        <?= Yii::t('app', 'Relations and Query') ?>
    </div>
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($generator, 'generateRelations')->checkbox() ?>
            <?= $form->field($generator, 'relations')->dropDownList([
                    Generator::RELATIONS_ALL => 'All relations',
                    Generator::RELATIONS_ALL_INVERSE => 'All relations with inverse',
                ]) ?>
            <?= $form->field($generator, 'generateRelationsFromCurrentSchema')->checkbox() ?>
        </div>
        <div class="column">
            <?= $form->field($generator, 'generateQuery')->checkbox() ?>
            <?= $form->field($generator, 'queryNs') ?>
            <?= $form->field($generator, 'queryBaseClass') ?>
            <?= $form->field($generator, 'queryClass') ?>
        </div>
    </div>
</div>
<div class="ui attached padded segment">
    <div class="ui small header" style="font-weight: 500;">
        <?= Yii::t('app', 'Labels and Translation') ?>
    </div>
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($generator, 'generateLabelsFromComments')->checkbox() ?>
        </div>
        <div class="column">
            <?= $form->field($generator, 'enableI18N')->checkbox() ?>
            <?= $form->field($generator, 'messageCategory') ?>
        </div>
    </div>
</div>