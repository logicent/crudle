<?php

use crudle\app\setting\models\Setup;
use crudle\ext\web_cms\models\WebsiteSettingsForm;
use yii\helpers\Html;

$webSettings = Setup::getSettings( WebsiteSettingsForm::class );
$loginButton = Html::a(Yii::t('app', 'Log in'), ['/app/login'], ['class' => 'ui button']);
$signupButton = Html::a(Yii::t('app', 'Sign up'), ['/app/signup'], ['class' => 'ui primary button']);
?>
<!-- Following Menu -->
<div class="ui large top fixed hidden menu">
    <div class="ui container">
        <?php
            foreach ($webSettings->siteNavHeader as $navItem) :
                $route = 'site' . $navItem['route'];
                $active = $route == $this->context->id ? 'active ' : null;
                echo Html::a($navItem['label'], $navItem['route'], ['class' => "{$active}item"]);
            endforeach ?>
        <div class="right menu">
        <?php
        if (Yii::$app->user->isGuest) : ?>
            <div class="item">
            <?= $loginButton ?>
            </div>
        <?php
        else : ?>
            <div class="ui dropdown item">
            <?= $this->render('__menu') ?>
            </div>
        <?php
        endif;
        if (Yii::$app->user->isGuest && !$webSettings->disableSignup) : ?>
            <div class="item">
            <?= $signupButton ?>
            </div>
        <?php
        endif ?>
        </div>
    </div>
</div>

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
<?php
foreach ($webSettings->siteNavHeader as $navItem) :
    $route = 'site' . $navItem['route'];
    $active = $route == $this->context->id ? 'active ' : null;
    echo Html::a($navItem['label'], $navItem['route'], ['class' => "{$active}item"]);
endforeach;

if (Yii::$app->user->isGuest) :
    echo $loginButton;
else : ?>
    <div class="ui dropdown item">
    <?= $this->render('__menu') ?>
    </div>
<?php
endif;
if (Yii::$app->user->isGuest && !$webSettings->disableSignup) :
    echo $signupButton;
endif ?>
</div>