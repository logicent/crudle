<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;

$this->title = Yii::t('app', 'Blog Writer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog Writer'), 'url' => ['/blog/writer']];

echo Elements::header($author->full_name);
echo Elements::image(Yii::getAlias('@web/uploads/') . $author->image_link);
echo Html::tag('div', $author->designation);
echo Html::tag('div', $author->bio);
