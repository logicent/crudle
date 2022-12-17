<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\Url;
use icms\FomanticUI\Elements;

$menuGroups = ArrayHelper::map($menuList, 'label', 'label', 'group');
$menuGroupClass = $this->params['menuGroupClass'];
$currentUrl = explode('/', Url::current());
$lastElement = $currentUrl[array_key_last($currentUrl)];

?>

<div class="ui five column grid">
    <div class="ui card in-page-sidebar">
<?php
    foreach ($menuGroups as $groupName => $groupItems) : ?>
        <div class="content">
            <?= Html::tag('div',
                    Elements::icon($menuGroupClass::enumIcons()[$groupName], ['class' => 'grey right floated']) .
                    // '&ensp;'.
                    $menuGroupClass::enums()[$groupName], [
                    'class' => 'header',
                    'style' => 'font-family: inherit; margin-bottom: 1em; color: #36414c; font-weight: normal;'
                ]) ?>
            <div class="description" style="background: inherit;">
            <?php
                foreach ( $menuList as $menu ) :
                    if ( (empty($menu['group']) || $menu['group'] == $groupName)
                        && $menu['visible'] === true) :
                        $currentMenu = explode('/', $menu['route']); 
                        echo Html::tag('div',
                                Html::a(Elements::icon('angle right') .
                                        Yii::t('app', '{menuLabel}', ['menuLabel' => $menu['label']]),
                                        Url::to([$menu['route']]),
                                        [
                                            'class' => $lastElement == $currentMenu[array_key_last($currentMenu)-1] ? 'item active' : 'item',
                                            'style' => 'color: #6c7680;'
                                        ]
                                ),
                                ['class' => 'ui link selection list']
                            );
                    endif;
                endforeach; ?>
            </div><!-- ./description -->
        </div><!-- ./content -->
<?php
    endforeach; ?>
    </div><!-- ./ui card -->
</div><!-- ./ui column grid -->