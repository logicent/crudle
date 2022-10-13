<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;
use yii\helpers\Url;

$currentRoute = explode('/', Url::current());
$moduleSegment = $currentRoute[array_key_last($currentRoute)]; // module id

$sidebarMenus = $this->context->sidebarMenus();
if (empty($sidebarMenus)) : // fetch the default sidebar menus
        $sidebarMenus = require Yii::getAlias('@appMain/views/_layouts/_main_sidebar_menu.php');
endif;
?>

<div class="ui visible icon sidebar vertical menu" id="main_sidebar">
<?php
        foreach ($sidebarMenus as $sidebarMenu) :
                $menuRoute = explode('/', $sidebarMenu['route']);
                // avoid -1 issue if index is last key is 0
                $menuIndex = count($menuRoute) > 1 ? array_key_last($menuRoute) : 1;
                echo Html::a(
                        Elements::icon($sidebarMenu['icon']) . Yii::t('app', $sidebarMenu['label']),
                        ["/app/{$sidebarMenu['route']}"],
                        ['class' => $moduleSegment == $menuRoute[$menuIndex - 1] ? 'item active' : 'item'],
                );
        endforeach ?>
</div>

<?php
$this->registerJs(<<<JS
    $('#main_menu').on('click', function(e){
        // $('.ui.labeled.icon.sidebar')
        $('.ui.sidebar')
            .sidebar('setting', 'dimPage', false)
            .sidebar('setting', 'transition', 'overlay')
            .sidebar('setting', 'onChange', $('body').removeClass('dimmable pushable'))
            .sidebar('toggle');
    });
JS);
