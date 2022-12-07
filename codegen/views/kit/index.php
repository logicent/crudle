<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $generators \crudle\kit\Generator[] */
/* @var $content string */

$this->title = Yii::t('app', 'Crudle Kit');
echo $this->render('_breadcrumb');

$generators = Yii::$app->controller->module->generators;
?>
<div class="ui secondary top attached padded segment">
    <div class="ui header" style="color: #36414c; font-weight: normal;">
        <?= Yii::t('app', 'Start coding easy with these quick CRUD application logic generators:') ?>
    </div>
</div>

<div class="ui attached padded segment">
    <div class="ui two column grid">
<?php
    foreach ($generators as $id => $generator) : ?>
        <div class="generator column">
            <h3 class="ui small header" style="color: #6c7680"><?= Html::encode($generator->getName()) ?></h3>
            <p style="color: #6c7680;"><?= $generator->getDescription() ?></p>
            <p><?= Html::a('View', ['kit/view', 'id' => $id], ['class' => 'ui small button']) ?></p>
        </div>
<?php
    endforeach ?>
    </div>
</div>
<div class="ui secondary bottom attached padded segment">
    <!-- https://github.com/logicent/kit-generators -->
    <?= Html::a(Yii::t('app', 'Get more'), '#', ['class' => 'ui primary button']) ?>
</div>