<?php

use app\helpers\App;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\helpers\Size;
use Zelenin\yii\SemanticUI\modules\Checkbox;
use Zelenin\yii\SemanticUI\modules\Modal;


$modal = Modal::begin([
    'class' => 'item--modal',
    'size' => Size::MEDIUM,
]);
$modal::end();
?>

<div id="<?= $listId ?>">
    <table class="in-form ui celled table">
        <thead>
            <tr style="font-size: 110%">
                <th class="select-all-rows" width="10%">
                    <?= Checkbox::widget(['name' => 'select_all_rows', 'options' => ['style' => 'vertical-align: text-top']]) ?>
                    <?= Yii::t('app', 'No.') ?>
                </th>
                <?php
                    foreach ($columnHeaders as $columnHeader) :
                        echo Html::tag('th', $model->getAttributeLabel($columnHeader), ['width' => '20%']);
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
            if (!empty($items)) :
                foreach ($items as $id => $item) :
                    echo $this->render('_form', [
                            'model' => $item,
                            'rowId' => $id + 1
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
    echo Elements::button('Add Item', [
            'class' => 'compact small add-row',
            'data'  => [
                'model-class' => App::className($model),
                'form-view' => $formView,
            ]
        ]) ?>
</div>