<?php

use yii\helpers\Html;
?>
<td>
    <?= Html::checkbox('menu_item') ?>
</td>
<td>
    <?= Html::activeTextInput($model, 'label', ['maxlength' => true]) ?>
</td>
<td>
    <?= Html::activeTextInput($model, 'route', ['maxlength' => true]) ?>
</td>
<td>
    <?= Html::activeTextInput($model, 'group', ['maxlength' => true]) ?>
</td>
<td>
    <?= Html::activeCheckbox($model, 'inactive') ?>
</td>
<td>
    <?= Html::activeHiddenInput($model, 'icon') ?>
    <?= Html::activeHiddenInput($model, 'icon_path') ?>
    <?= Html::activeHiddenInput($model, 'icon_color') ?>
</td>