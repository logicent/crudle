<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Blog');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog'), 'url' => ['/blog']];
?>

<div class="ui inverted vertical center aligned segment">
    <?= $this->render('@extModules/web_cms/layouts/site/_navbar') ?>
</div>

<div class="ui vertical stripe segment">
    <div class="ui text container">
        <div class="ui relaxed link list">
<?php
foreach ($articles as $article) : ?>
            <div class="item">
                <?= Html::a($article->title, "/blog/{$article->id}", ['class' => 'header']) ?>
                <div class="description">
                    <?= Html::tag('p', $article->intro) ?>
                </div>
            </div>
<?php
endforeach ?>
        </div>
    </div>
</div>