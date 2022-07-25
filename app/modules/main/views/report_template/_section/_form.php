<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

$readonly = $this->context->action->id == 'read';
$count = range(0, 9);

?>
<tr id="TemplateSection_<?= $row_id ?>">
    <td>
        <div class='ui transparent input'>
        <?= Html::activeTextInput( $model, "[{$row_id}]section", ['readonly' => $readonly, 'maxlength' => true]) ?>
        </div>
    </td>
    <td>
        <div class='ui transparent input'>
        <?= Html::activeTextInput( $model, "[{$row_id}]code_prefix", ['readonly' => $readonly, 'maxlength' => true]) ?>
        </div>
    </td>
    <td>
        <?= Html::activeDropDownList($model, "[{$row_id}]level", $count, ['readonly' => $readonly]) ?>        
    </td>
    <td>
        <?= Html::activeDropDownList($model, "[{$row_id}]limit", $count, ['readonly' => $readonly]) ?>        
    </td>
    <td class="center aligned">
        <?= Html::activeHiddenInput( $model, "[{$row_id}]actionType") ?>
        <a data-row-id="TemplateSection_<?= $row_id ?>" class="compact ui mini icon button del-btn"><?= Elements::icon('close grey') ?></a>
    </td>
</tr>
