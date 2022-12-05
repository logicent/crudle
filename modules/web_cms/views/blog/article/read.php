<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;

$this->title = Yii::t('app', 'Blog Article');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog Article'), 'url' => ['/blog']];
?>

<div class="ui vertical stripe segment">
    <div class="ui text container">
        <?= Elements::header($article->title) ?>
        <?= Html::tag('div', $article->content) ?>
    </div>
</div>