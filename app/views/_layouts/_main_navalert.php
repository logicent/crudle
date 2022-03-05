<?php

use yii\helpers\Html;
?>
<?= Html::a(Yii::t('app', 'Sales Order') . Html::tag('div', '0', ['class' => 'ui circular label']), null, ['class' => 'item']) ?>
<div class="divider" style="margin: 0"></div>
<?= Html::a(Yii::t('app', 'Purchase Order') . Html::tag('div', '0', ['class' => 'ui circular label']), null, ['class' => 'item']) ?>