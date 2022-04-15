<?php

use app\modules\setup\models\LayoutSettingsForm;
use app\modules\setup\models\Setup;
use yii\helpers\Html;
use yii\helpers\Url;
use Zelenin\yii\SemanticUI\Elements;

$this->title = Yii::$app->params['appName'];

$layoutSettings = Setup::getSettings( LayoutSettingsForm::class );
?>

<div id="dash" class="ui stackable grid main-index">
    <div class="doubling six column row">
    <?php
        foreach ($layoutSettings->shortcutMenu as $menuItem) :
            echo Html::tag('div',
                    Html::a(!empty($menuItem['icon']) ? Elements::icon($menuItem['icon'] .' '. $menuItem['iconColor']) :
                            Elements::image(Yii::getAlias('@web/') . $menuItem['iconPath'], ['style' => 'width: 48px']),
                            Url::to([$menuItem['route']]),
                            ['class' => "massive ui {$menuItem['iconColor']} icon button"]
                        ) .
                    Html::tag('div', Yii::t('app', '{menuLabel}', ['menuLabel' => $menuItem['label']]),
                            ['class' => 'ui mini header', 'style' => 'margin: 0.5em 0; font-weight: 500']
                        ),
                    ['class' => 'column center aligned app-icon']
                );
        endforeach ?>
    </div><!-- doubling -->
</div><!-- main icons -->

<div class="ui section hidden divider"></div>

<?= $this->render('_dash_panels', ['stats' => $stats]) ?>
