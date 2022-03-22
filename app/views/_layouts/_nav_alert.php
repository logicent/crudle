<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

?>

<div class="ui dropdown item" id="open_issues">
    <?= Html::a(Elements::icon('bell outline orange large'), ['#'],
            [
                'class' => 'compact ui icon button',
                'style' => 'background: #fafbfc'
            ]) ?>
    <div class="ui vertical menu nav-menu" style="margin-top: 0.8em !important;">
        <?= Html::a(Yii::t('app', 'Email notification') . Html::tag('div', '0', ['class' => 'ui circular label']), null, ['class' => 'item']) ?>
    </div><!-- ./vertical menu -->
</div><!-- ./dropdown item -->