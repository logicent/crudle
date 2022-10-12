<?php

use crudle\app\helpers\App;
use yii\helpers\Html;
use icms\FomanticUI\Elements;
use icms\FomanticUI\helpers\Size;
use icms\FomanticUI\modules\Checkbox;
use icms\FomanticUI\modules\Modal;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

$modal = Modal::begin([
    'id' =>  $listId . '__modal',
    'size' => Size::MEDIUM,
]);
$modal::end();

$modelName = StringHelper::basename($modelClass);
if ($this->context->action == 'create'):
    $detailModels = $this->context->getDetailModels()[$modelName];
else :
    $detailModelId = Inflector::variablize($modelName);
    $detailModels = $this->context->getDetailModels()[$detailModelId];
endif;
$viewPath = $this->context->viewPath;
$listColumns = $viewPath . "/$listId/list_columns.php";
$columnHeaders = require $listColumns;
$tableRowView = $viewPath . "/$listId/_row_inputs.php";
$detailView = Inflector::underscore($modelName);
$rowInputView = "$detailView/_row_inputs";
$hideSelectAllCheckbox = empty($detailModels) ? 'none' : '';
?>

<div id="<?= $listId ?>">
    <table class="in-form ui celled table">
        <thead>
            <tr style="font-size: 110%">
                <th class="center aligned select-all-rows" width="7%">
                    <?= Checkbox::widget([
                            'name' => 'select_all_rows',
                            'options' => [
                                'style' => "vertical-align: text-top; display: $hideSelectAllCheckbox"
                            ]
                        ]) ?>
                    <?= Yii::t('app', 'No.') ?>
                </th>
                <?php
                    foreach ($columnHeaders as $columnHeader) :
                        // To-Do: to be retrieved from the child list_columns view
                        $columnHeading = Inflector::camel2words(Inflector::id2camel($columnHeader['name']));
                        echo Html::tag('th', $columnHeading, ['class' => $columnHeader['width'] . ' wide']);
                    endforeach;
                ?>
                <th class="one wide center aligned">
                    <?= Html::a(Elements::icon('ellipsis horizontal', ['class' => 'grey', 'style' => 'margin-right: 0em']),
                                false,
                                ['class' => 'compact ui icon']) ?>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            if (!empty($detailModels)) :
                $rowId = 0;
                foreach ($detailModels as $id => $detailModel) :
                    echo $this->renderFile($tableRowView, [
                            'modelClass' => $modelClass,
                            'model' => $detailModel,
                            'rowId' => $rowId++
                        ]);
                endforeach;
            else :
                echo $this->render('../_no_data');
            endif ?>
        </tbody>
    </table>
<?php
    echo Elements::button('Delete', [
            'class' => 'compact red small del-row',
            'data' => [
                'model-class' => $modelClass
            ],
            'style' => 'display : none'
        ]);
    echo Elements::button('Add row', [
            'class' => 'compact small add-row',
            'data'  => [
                'model-class' => $modelClass,
                'form-view' => $rowInputView,
            ]
        ]) ?>
</div>