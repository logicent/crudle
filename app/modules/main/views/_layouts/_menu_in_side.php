<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use Zelenin\yii\SemanticUI\Elements;

ArrayHelper::multisort($menuList, 'label');
ArrayHelper::multisort($menuList, 'group');
$menuGroups = ArrayHelper::map($menuList, 'label', 'label', 'group');
$menuGroupClass = $this->params['menuGroupClass'];

foreach ($menuGroups as $groupName => $groupItems) :
    if ($menuGroup !== $groupName)
        continue;
    ?>
    <div class="ui card" style="background: inherit;">
        <div class="content">
            <?= Html::tag('div',
                    Elements::icon($menuGroupClass::enumIcons()[$groupName], ['class' => 'grey right floated']) .
                    '&ensp;'.
                    $menuGroupClass::enums()[$groupName], [
                        'style' => 'font-family: inherit; margin-bottom: 1em; color: #36414c; font-weight: normal;'
                    ]) ?>
            <div class="description">
            <?php
                foreach ( $menuList as $menu ) :
                    $isActive = Url::to([$menu['route']]) === Url::current() ? 'active' : null;
                    if ( (empty($menu['group']) || $menu['group'] == $groupName)
                        && $menu['visible'] === true) :
                        echo Html::tag('div',
                                Html::a(Elements::icon('angle right') . Yii::t('app', '{menuLabel}', ['menuLabel' => $menu['label']]),
                                        Url::to([$menu['route']]),
                                        ['class' => "item {$isActive}", 'style' => 'color: #6c7680;']
                                ),
                                ['class' => 'ui link selection list']
                            );
                    endif;
                endforeach; ?>
            </div><!-- ./description -->
        </div><!-- ./content -->
    </div><!-- ./ui card -->
<?php
endforeach; ?>

