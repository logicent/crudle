<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;

$this->title = Yii::t('app', 'Blog Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog Category'), 'url' => ['/blog/category']];
?>

<div class="ui vertical stripe segment">
    <div class="ui text container">
<?= Elements::header($category->description) ?>
<?= Html::tag('div', $category->description) ?>
    </div>
</div>
