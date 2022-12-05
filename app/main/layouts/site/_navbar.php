<?php

use crudle\app\setup\models\GeneralSettingsForm;
use crudle\app\setup\models\Setup;
use yii\helpers\Url;
use yii\helpers\Html;

$generalSettings = Setup::getSettings( GeneralSettingsForm::class );
?>

<?php $this->beginBlock('@appMain/layouts/site/_navbar') ?>

<div id="site_header">
    <div class="ui attached menu borderless" style="padding: 1em 0em;">
        <div class="ui container">
            <div class="item">
                <div class="ui header text-muted" style="font-weight: 500;">
                    <?= $generalSettings->name ?
                        $generalSettings->name : Yii::$app->params['appName'] ?>
                </div>
            </div>
            <div class="right menu">
                <?php if (Yii::$app->user->isGuest) : ?>
                    <a class="item active" href="<?= Url::toRoute('/app/login') ?>"><?= Yii::t('app', 'Log in') ?></a>
                <?php else : ?>
                    <!-- Published menu items -->
                    <div class="ui dropdown item">
                        <!-- <img class="ui mini image" src="<?= Yii::$app->urlManager->baseUrl ?>/img/placeholder-photo.jpg"> -->
                        &ensp;<?= Yii::$app->user->identity->username ?><i class="dropdown icon"></i>
                        <div class="menu">
                            <?= Html::a(Yii::t('app', 'Switch to Dash'), ['/app/home'], ['class' => 'item']) ?>
                            <?= Html::tag('div', null, ['class' => 'divider', 'style' => 'margin: 0']) ?>
                            <?= Html::a(Yii::t('app', 'Log out'), ['/app/logout'], [
                                    'class' => 'item',
                                    'data' => ['method' => 'post']
                                ]) ?>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>

<?php $this->endBlock();