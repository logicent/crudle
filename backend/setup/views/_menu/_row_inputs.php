<?php

use crudle\app\main\helpers\App;
use yii\helpers\Html;
use icms\FomanticUI\Elements;
use icms\FomanticUI\modules\Checkbox;

?>
<tr id="<?= $model->formName() .'_'. $rowId ?>">
    <td class="select-row center aligned">
        <?= Checkbox::widget([
                'name' => "[$rowId]item",
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
        <?= Html::activeTextInput($model, "[$rowId]icon", ['maxlength' => true]) ?>
    </td>
    <td class="center aligned">
        <?= Checkbox::widget([
                'model' => $model,
                'attribute' => "[$rowId]inactive",
                'labelOptions' => ['label' => false],
                'options' => [
                    'style' => 'vertical-align: text-top'
                ]
            ]) ?>
    </td>
    <td class="one wide center aligned">
        <?= Html::a(Elements::icon('grey pencil'), null, [
                    'class' => 'edit-row compact ui small basic icon button',
                    'style' => 'margin: 0em;',
                    'data' => [
                        'model-class' => App::className($model),
                        'modal-form' => '@appSetup/views/_menu/field_inputs',
                    ]
                ]) ?>
        <?= Html::activeHiddenInput($model, "[$rowId]openInNewTab") ?>
        <?= Html::activeHiddenInput($model, "[$rowId]alignRight") ?>
        <?= Html::activeHiddenInput($model, "[$rowId]type") ?>
        <?= Html::activeHiddenInput($model, "[$rowId]parentLabel") ?>
        <?= Html::activeHiddenInput($model, "[$rowId]icon") ?>
        <?= Html::activeHiddenInput($model, "[$rowId]iconPath") ?>
        <?= Html::activeHiddenInput($model, "[$rowId]iconColor") ?>
    </td>
</tr>