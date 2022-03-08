<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>

<div class="ui card">
    <div class="content">
        <div class="header"><?php //= $heading ?></div>
        <div class="meta"><?php //= $subHeading ?></div>
        <div class="description">
            <?php
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
                endforeach; ?>
        </div>
    </div>
</div>