<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;
use yii\helpers\Url;

$currentRoute = explode('/', Url::current());
$urlSegments = count($currentRoute);
$moduleIndex = array_search($this->context->module->id, $currentRoute);
if (empty($moduleIndex)) :
        $moduleSegment = $currentRoute[$urlSegments - 1]; // assumes last key ?
else :
        $moduleSegment = $currentRoute[$moduleIndex];
endif;

$sidebarMenus = $this->context->sidebarMenus();
if (empty($sidebarMenus)) : // fetch the default sidebar menus
        $sidebarMenus = require Yii::getAlias('@appMain/layouts/_main_sidebar_menu.php');
endif;
?>

<div class="ui visible icon sidebar vertical menu">
<?php
        foreach ($sidebarMenus as $sidebarMenu) :
                $menuRoute = explode('/', $sidebarMenu['route']);
                // avoid -1 issue if index is last key is 0
                $menuIndex = count($menuRoute) > 1 ? count($menuRoute) - 1 : 0;
                echo Html::a(
                        Elements::icon($sidebarMenu['icon']) . Yii::t('app', $sidebarMenu['label']),
                        ["/app/{$sidebarMenu['route']}"],
                        ['class' => $moduleSegment == $menuRoute[$menuIndex] ? 'item active' : 'item'],
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
