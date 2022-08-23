<?php

use crudle\app\helpers\App;
use yii\helpers\Html;
use icms\FomanticUI\Elements;
use icms\FomanticUI\helpers\Size;
use icms\FomanticUI\modules\Checkbox;
use icms\FomanticUI\modules\Modal;


$modal = Modal::begin([
    'id' =>  $listId . '__modal',
    'size' => Size::MEDIUM,
]);
$modal::end();

$hideSelectAllCheckbox = empty($this->context->getDetailModels()) ? 'none' : '';
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
                        echo Html::tag('th', $model->getAttributeLabel($columnHeader['name']), ['class' => $columnHeader['width'] . ' wide']);
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
                    echo $this->render($formView, [
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
                'model-class' => App::className($model)
            ],
            'style' => 'display : none'
        ]);
    echo Elements::button('Add row', [
            'class' => 'compact small add-row',
            'data'  => [
                'model-class' => App::className($model),
                'form-view' => $formView,
            ]
        ]) ?>
</div>
