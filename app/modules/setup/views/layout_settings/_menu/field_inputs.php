<?php

use app\helpers\App;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;

?>
<tr>
    <td class="select-row center aligned">
        <?= Checkbox::widget([
                'name' => "[$rowId]menu_item",
                'options' => ['style' => 'vertical-align: text-top']
            ]) ?>
    </td>
    <td>
        <?= Html::activeTextInput($model, "[$rowId]label", ['maxlength' => true]) ?>
    </td>
    <td>
        <?= Html::activeTextInput($model, "[$rowId]route", ['maxlength' => true]) ?>
    </td>
    <td>
        <?= Html::activeTextInput($model, "[$rowId]group", ['maxlength' => true]) ?>
    </td>
    <td class="center aligned">
        <?= Checkbox::widget([
                'name' => "[$rowId]inactive",
                'options' => ['style' => 'vertical-align: text-top']
            ]) ?>
    </td>
    <td class="one wide center aligned">
        <?= Html::a(Elements::icon('grey pencil'), null, [
                    'class' => 'edit-item--btn compact ui basic icon button',
                    'style' => 'margin: 0em;',
                    'data' => [
                        // 'modal-id' => $listId . '__modal',
                        'model-class' => App::className($model),
                        'form-view' => '@app_setup/views/layout_settings/_menu/_edit_form',
                    ]
                ]) ?>
        <?= Html::activeHiddenInput($model, "[$rowId]type") ?>
        <?= Html::activeHiddenInput($model, "[$rowId]icon") ?>
        <?= Html::activeHiddenInput($model, "[$rowId]iconPath") ?>
        <?= Html::activeHiddenInput($model, "[$rowId]iconColor") ?>
    </td>
</tr>