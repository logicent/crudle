<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;

$readonly = $this->context->action->id == 'read';
$count = range(0, 9);

?>
<tr id="TemplateSection_<?= $rowId ?>">
    <td>
        
    </td>
    <td>
        <div class='ui transparent input'>
        <?= Html::activeTextInput( $model, "[$rowId]section", ['readonly' => $readonly, 'maxlength' => true]) ?>
        </div>
    </td>
    <td>
        <div class='ui transparent input'>
        <?= Html::activeTextInput( $model, "[$rowId]code_prefix", ['readonly' => $readonly, 'maxlength' => true]) ?>
        </div>
    </td>
    <td>
        <?= Html::activeDropDownList($model, "[$rowId]level", $count, ['readonly' => $readonly]) ?>        
    </td>
    <td>
        <?= Html::activeDropDownList($model, "[$rowId]limit", $count, ['readonly' => $readonly]) ?>        
    </td>
    <td class="center aligned">
        <?= Html::activeHiddenInput( $model, "[$rowId]actionType") ?>
        <a data-row-id="TemplateSection_<?= $rowId ?>" class="compact ui mini icon button del-btn"><?= Elements::icon('close grey') ?></a>
    </td>
</tr>
