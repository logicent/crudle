<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Category'), 'url' => ['/category']];
?>

<div class="ui vertical stripe segment">
    <div class="ui text container">
<?php
foreach ($categories as $category) :
    echo Html::a($category->description, "/blog/category/{$category->id}");
endforeach ?>
    </div>
</div>