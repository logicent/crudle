<?php

use crudle\app\setting\forms\GeneralSettingsForm;
use crudle\app\setting\models\Setup;
use crudle\ext\web_cms\models\WebsiteSettingsForm;
use yii\helpers\Url;
use yii\helpers\Html;

$generalSettings = Setup::getSettings( GeneralSettingsForm::class );
$webSettings = Setup::getSettings( WebsiteSettingsForm::class );
?>

<?php $this->beginBlock('@extModules/web_cms/layouts/site/_navbar') ?>

<div id="site_header">
    <div class="ui menu borderless" style="padding: 1em 0em;">
        <div class="ui container">
            <div class="item">
                <div class="ui header text-muted" style="font-weight: 500;">
                    <?= $generalSettings->name ?
                        $generalSettings->name : Yii::$app->params['appName'] ?>
                </div>
            </div>
        <?php
            foreach ($webSettings->siteNavHeader as $navItem) :
                $route = 'site' . $navItem['route'];
                if ($route == $this->context->id) :
                    $active = 'active';
                else : $active = '';
                endif;
                echo Html::a($navItem['label'], $navItem['route'], ['class' => "{$active} item"]);
            endforeach ?>
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

<?php $this->endBlock() ?>