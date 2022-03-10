<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use Zelenin\yii\SemanticUI\Elements;

ArrayHelper::multisort($menuList, 'label');
ArrayHelper::multisort($menuList, 'group');
$menuGroups = ArrayHelper::map($menuList, 'label', 'label', 'group');
?>

<div class="ui four column grid">
<?php
    foreach ($menuGroups as $groupName => $groupItems) : ?>
    <div class="column">
        <div class="ui card">
            <div class="content">
                <?= Html::tag('div', $groupName, [
                        'class' => 'header', 
                        'style' => 'font-family: inherit; margin-bottom: 1em; color: #36414c; font-weight: normal;'
                    ]) ?>
                <div class="description">
                <?php
                    foreach ( $menuList as $menu ) :
                        if ( $menu['visible'] === false || $menu['group'] !== $groupName )
                            continue;
                        echo Html::tag('div',
                                Html::a(Elements::icon('angle right') . Yii::t('app', '{menuLabel}', ['menuLabel' => $menu['label']]),
                                        Url::to([$menu['route']]),
                                        ['class' => 'item', 'style' => 'color: #6c7680;']
                                ),
                                ['class' => 'ui link selection list']
                            );
                    endforeach; ?>
                </div><!-- ./description -->
            </div><!-- ./content -->
        </div><!-- ./ui card -->
    </div><!-- ./column -->
<?php
    endforeach; ?>
</div><!-- ./ui column grid -->

