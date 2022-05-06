<?php

use crudle\app\helpers\AppHelper;
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
                    'class' => 'edit-item--btn compact ui small basic icon button',
                    'style' => 'margin: 0em;',
                    'data' => [
                        'model-class' => AppHelper::className($model),
                        'form-view' => '@app_cms/views/about_page/team_member/_edit_form',
                        // 'row-id' => $rowId,
                    ]
                ]) ?>
        <?= Html::activeHiddenInput($model, "[$rowId]bio", ['data' => ['name' => 'bio']]) ?>
        <?= Html::activeHiddenInput($model, "[$rowId]photoImage", ['data' => ['name' => 'photoImage']]) ?>
    </td>
</tr>