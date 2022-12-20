<?php

use crudle\app\setting\models\Setup;
use crudle\ext\web_cms\models\WebsiteSettingsForm;
use yii\helpers\Html;

$webSettings = Setup::getSettings( WebsiteSettingsForm::class );
?>

<div class="ui container">
    <div class="ui large secondary inverted pointing menu">
        <a class="toc item">
            <i class="sidebar icon"></i>
        </a>
        <?php
            foreach ($webSettings->siteNavHeader as $navItem) :
                $route = 'site' . $navItem['route'];
                $active = $route == $this->context->id ? 'active ' : null;
                echo Html::a($navItem['label'], $navItem['route'], ['class' => "{$active}item"]);
            endforeach
        ?>
        <div class="right item">
        <?php
        if (Yii::$app->user->isGuest) :
            echo Html::a(Yii::t('app', 'Log in'), ['/app/login'], ['class' => 'ui inverted button']);
        else : ?>
            <div class="ui dropdown inverted button">
            <?= $this->render('__menu') ?>
            </div>
        <?php
        endif;
        if (Yii::$app->user->isGuest && !$webSettings->disableSignup) :
            echo Html::a(Yii::t('app', 'Sign up'), ['/app/signup'], ['class' => 'ui inverted button']);
        endif ?>
        </div>
    </div>
</div>

<?php
$this->registerJs(<<<JS
    $('.ui.dropdown').dropdown();
JS);