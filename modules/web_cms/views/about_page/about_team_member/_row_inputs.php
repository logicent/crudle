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
        <?= Html::activeTextInput($model, "[$rowId]fullName", [
                'maxlength' => true,
                'data' => ['name' => 'fullName']
            ]) ?>
    </td>
    <td>
        <?= Html::activeTextInput($model, "[$rowId]designation", [
                'maxlength' => true,
                'data' => ['name' => 'designation']
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
                    'class' => 'edit-row compact ui small basic icon button',
                    'style' => 'margin: 0em;',
                    'data' => [
                        'model-class' => App::className($model),
                        'form-view' => 'about_team_member/field_inputs',
                        // 'row-id' => $rowId,
                    ]
                ]) ?>
        <?= Html::activeHiddenInput($model, "[$rowId]bio", ['data' => ['name' => 'bio']]) ?>
        <?= Html::activeHiddenInput($model, "[$rowId]photoImage", ['data' => ['name' => 'photoImage']]) ?>
    </td>
</tr>