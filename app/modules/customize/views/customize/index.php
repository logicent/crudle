<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Customize');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customize'), 'url' => ['index']];

$menuList = require __DIR__ . '/_menu.php';

    foreach ( $menuList as $menu ) :
        if ( $menu['visible'] === false )
            continue;

        echo Html::tag('div',
                Html::a(Yii::t('app', '{menuLabel}', ['menuLabel' => $menu['label']]),
                        Url::to([$menu['route']]),
                        ['class' => 'item']
                ),
                ['class' => 'ui bulleted link list']
            );
    endforeach;
?>