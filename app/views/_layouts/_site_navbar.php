<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>

<div class="ui attached menu borderless">
    <div class="ui container">
        <div class="item">
            <div class="ui header text-muted" style="font-weight: 500;">
                <?= !empty($this->params['businessName']) ? $this->params['businessName'] : Yii::t('app', 'Your Business Name') ?>
            </div>
        </div>
        <div class="right menu">
            <?php if (Yii::$app->user->isGuest) : ?>
                <a class="item active" href="<?= Url::toRoute('site/login') ?>"><?= Yii::t('app', 'Log in') ?></a>
            <?php else : ?>
                <!-- Published menu items -->
                <div class="ui dropdown item">
                    <!-- <img class="ui mini image" src="<?php // Yii::$app->urlManager->baseUrl ?>/img/photo-ph.jpg"> -->
                    &ensp;<?= Yii::$app->user->identity->username ?><i class="dropdown icon"></i>
                    <div class="menu">
                        <?= Html::a(Yii::t('app', 'My account'), ['people/update', 'id' => is_null( Yii::$app->user->identity ) ? '' : Yii::$app->user->id], ['class' => 'item']) ?>
                        <?= Html::a(Yii::t('app', 'Switch to Dash'), ['/'], ['class' => 'item']) ?>
                        <div class="divider" style="margin: 0"></div>
                        <?= Html::a(Yii::t('app', 'Log out'), ['/logout'], [
                            'class' => 'item',
                            'data' => ['method' => 'post']
                        ]) ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>
