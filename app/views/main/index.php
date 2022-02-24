<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use Zelenin\yii\SemanticUI\Elements;

$this->title = Yii::$app->params['appName'];

$menuList = require __DIR__ . '/_menu.php';
// ArrayHelper::multisort($menuList, 'label');
// ArrayHelper::multisort($menuList, 'group');
// $menuGroups = ArrayHelper::map($menuList, 'label', 'label', 'group');

?>

<!-- <div class="ui hidden divider"></div> -->

<div id="dash" class="ui stackable grid main-index">
    <div class="doubling six column row">
    <?php
        // foreach ($menuGroups as $groupName => $groupItems) :
        //     echo Html::tag('div', $groupName, [
        //             'class' => 'column center aligned app-icon', 
        //             // 'style' => 'display: none'
        //         ]);
            foreach ( $menuList as $menu ) :
                // if ( $menu['group'] !== $groupName )
                //     continue;
                if ( $menu['visible'] === false )
                    continue;

                echo Html::tag('div',
                        Html::a(
                            !empty($menu['icon']) ?
                                Elements::icon($menu['icon']) :
                                Elements::image(Yii::getAlias('@web/') . $menu['iconPath'],
                                                ['style' => 'width: 48px']),
                            Url::to([$menu['route']]),
                            ['class' => "massive ui {$menu['iconColor']} icon button"]
                        ) .
                        Html::tag('div', Yii::t('app', '{menuLabel}', ['menuLabel' => $menu['label']]),
                                ['class' => 'ui mini header', 'style' => 'margin: 0.5em 0; font-weight: 500']
                            ),
                        ['class' => 'column center aligned app-icon']
                    );
            endforeach;
        // endforeach;
        ?>
    </div><!-- doubling -->
</div><!-- main icons -->

<div class="ui section hidden divider"></div>

<?= $this->render('_dash_panels', ['stats' => $stats]) ?>
