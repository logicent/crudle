<?php

use crudle\app\setup\models\LayoutSettingsForm;
use crudle\app\setup\models\Setup;
use yii\helpers\Html;
use yii\helpers\Url;
use icms\FomanticUI\Elements;


$layoutSettings = Setup::getSettings( LayoutSettingsForm::class );
?>

<div id="dash" class="ui stackable grid main-index">
    <div class="doubling eight column row">
    <?php
        foreach ($layoutSettings->shortcutMenu as $menuItem) :
            echo Html::tag('div',
                    Html::a(!empty($menuItem['icon']) ? Elements::icon($menuItem['icon']) :
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
