<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Blog');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog'), 'url' => ['/blog']];
?>

<div class="ui inverted vertical center aligned segment">
    <?= $this->render('@extModules/web_cms/views/_layouts/site/_navbar') ?>
</div>

<div class="ui vertical stripe segment">
    <div class="ui text container">
<?php
foreach ($articles as $article) :
    echo Html::a($article->title, "/blog/{$article->id}");
endforeach ?>
    </div>
</div>