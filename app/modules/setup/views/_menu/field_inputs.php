<?php

use app\helpers\App;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;

?>
<tr id="<?= $model->formName() .'_'. $rowId ?>">
    <td class="select-row center aligned">
        <?= Checkbox::widget([
                'name' => "[$rowId]item",
                'options' => ['style' => 'vertical-align: text-top']
            ]) ?>
    </td>
    <td>
        <?= Html::activeTextInput($model, "[$rowId]label", [
                'maxlength' => true,
                'data' => ['name' => 'label']
            ]) ?>
    </td>
    <td>
        <?= Html::activeTextInput($model, "[$rowId]route", [
                'maxlength' => true,
                'data' => ['name' => 'route']
            ]) ?>
    </td>
    <td>
        <?= Html::activeTextInput($model, "[$rowId]group", [
                'maxlength' => true,
                'data' => ['name' => 'group']
            ]) ?>
    </td>
    <td class="center aligned">
        <?= Checkbox::widget([
                'model' => $model,
                'attribute' => "[$rowId]inactive",
                'labelOptions' => ['label' => false],
                'options' => [
                    'data' => ['name' => 'inactive'],
                    'style' => 'vertical-align: text-top'
                ]
            ]) ?>
    </td>
    <td class="one wide center aligned">
        <?= Html::a(Elements::icon('grey pencil'), null, [
                    'class' => 'edit-item--btn compact ui small basic icon button',
                    'style' => 'margin: 0em;',
                    'data' => [
                        'model-class' => App::className($model),
                        'form-view' => '@app_setup/views/_menu/_edit_form',
                    ]
                ]) ?>
        <?= Html::activeHiddenInput($model, "[$rowId]type", ['data' => ['name' => 'type']]) ?>
        <?= Html::activeHiddenInput($model, "[$rowId]icon", ['data' => ['name' => 'icon']]) ?>
        <?= Html::activeHiddenInput($model, "[$rowId]iconPath", ['data' => ['name' => 'iconPath']]) ?>
        <?= Html::activeHiddenInput($model, "[$rowId]iconColor", ['data' => ['name' => 'iconColor']]) ?>
    </td>
</tr>