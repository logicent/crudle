<?php

use yii\helpers\Html;
?>

<!-- Published menu items -->
<!-- <img class="ui mini image" src="<?= Yii::$app->urlManager->baseUrl ?>/img/placeholder-photo.jpg"> -->
&ensp;<?= Yii::$app->user->identity->username ?><i class="dropdown icon"></i>
<div class="menu">
    <?= Html::a(Yii::t('app', 'Switch to Dash'), ['/app/home'], [
            'class' => 'item',
            'target' => '_blank'
        ]) ?>
    <?= Html::tag('div', null, ['class' => 'divider', 'style' => 'margin: 0']) ?>
    <?= Html::a(Yii::t('app', 'Log out'), ['/app/logout'], [
            'class' => 'item',
            'data' => ['method' => 'post']
        ]) ?>
</div>