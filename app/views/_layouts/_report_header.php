<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

?>
<!--  style="margin-top: 38.4667px;" -->
<div id="page_head" class="ui attached segment">
    <div class="ui two column grid container">
        <div class="ten wide column">
            <h2 class="ui floated header">
                <?= Html::encode($this->title) ?>
            </h2>
        </div>
        <div class="six wide column right aligned">
            <div class="ui">
                <?= Html::a(Yii::t('app', 'Export'), ['report-builder/export-csv', 'modelName' => $this->context->id], ['class' => 'compact ui primary small icon button']) ?>
                <?php //= $this->render('/_layouts/_menu') ?>
                <?php //= Html::a(Yii::t('app', 'Refresh'), ['refresh'], ['class' => 'compact ui small primary button']) ?>

                <!-- show Delete if viewed by owner/Administrator and report is custom report -->
                <?= Html::a(Yii::t('app', 'Delete'), ['deleteCheckedRows', 'data-checkedRowIds' => ''], [
                    'class' => 'compact ui small red button',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                    'style' => 'display: none'
                ]) ?>
            </div>
        </div>
    </div>
</div>
