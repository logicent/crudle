<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $generators \yii\gii\Generator[] */
/* @var $content string */

$generators = Yii::$app->controller->module->generators;
$this->title = 'Crudle Kit';
?>
<div class="ui padded segment">
    <div class="page-header">
        <h1 class="ui header" style="font-weight: 500;">Crudle Kit &ensp;<small class="text-muted">a magical tool that can write code for you</small></h1>
    </div>

    <div class="ui divider"></div>

    <div class="ui header" style="font-weight: 500;">Start the fun with the following code generators:</div>

    <div class="ui three column grid">
        <?php foreach ($generators as $id => $generator): ?>
        <div class="generator column">
            <h3 class="ui small header"><?= Html::encode($generator->getName()) ?></h3>
            <p><?= $generator->getDescription() ?></p>
            <p><?= Html::a('View', ['kit/view', 'id' => $id], ['class' => 'ui small button']) ?></p>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="ui divider"></div>

    <div>
        <a class="ui positive button" href="http://www.yiiframework.com/extensions/?tag=gii">Get more</a>
    </div>
</div>
