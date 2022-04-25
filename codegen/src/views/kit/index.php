<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $generators \crudle\kit\Generator[] */
/* @var $content string */

$generators = Yii::$app->controller->module->generators;
$this->title = 'Crudle Kit';
echo $this->render('_breadcrumb');
?>
<div class="ui padded segment">
    <div class="ui header text-muted" style="font-weight: 500;">Start the fun with the following code generators:</div>
    <div class="ui divider"></div>
    <div class="ui two column grid">
        <?php foreach ($generators as $id => $generator): ?>
        <div class="generator column">
            <h3 class="ui small header" style="color: #555"><?= Html::encode($generator->getName()) ?></h3>
            <p style="color: #6c7680;"><?= $generator->getDescription() ?></p>
            <p><?= Html::a('View', ['kit/view', 'id' => $id], ['class' => 'ui basic small button']) ?></p>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="ui divider"></div>

    <div>
        <a class="ui primary button" href="http://www.yiiframework.com/extensions/?tag=gii">Get more</a>
    </div>
</div>
