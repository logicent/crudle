<?php

use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\helpers\Size;
use Zelenin\yii\SemanticUI\modules\Checkbox;
use Zelenin\yii\SemanticUI\modules\Modal;


$modal = Modal::begin([
    'id' => '_modal',
    'size' => Size::MEDIUM,
]);
$modal::end();
?>

<div id="<?= $containerId ?>" class="ui attached padded segment">
    <table class="in-form ui celled table">
        <thead>
            <tr style="font-size: 110%">
        <?php
            if (!$this->context->isReadonly) : ?>
                <th class="select-all-rows" width="8%">
                    <?= Checkbox::widget(['name' => 'select_all_rows', 'options' => ['style' => 'vertical-align: text-top']]) ?>
                    <?= Yii::t('app', 'No.') ?>
                </th>
        <?php
            endif;
            // insert specific header columns here
                $this->render($columnHeaders, $options) ?>
                <th class="one wide center aligned">
                    <?= Html::a(Elements::icon('ellipsis horizontal', ['class' => 'grey', 'style' => 'margin-right: 0em']),
                                false,
                                ['class' => 'compact ui icon']) ?>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            $listModelId = Inflector::camel2id(StringHelper::basename($listModelClass));
            if ($model->isCopyRecord || !empty($model->$listModelId)) :
                foreach ($model->copyDetailModels[$listModelId] as $id => $detailModel) :
                    echo $this->render('_form', [
                            'model' => $detailModel,
                            'rowId' => $id
                        ]);
                endforeach;
            else : // $model->isNewRecord
                echo $this->render('../_no_data');
            endif ?>
        </tbody>
    </table>
<?php
    if (!$model->lockUpdate()) :
        echo Elements::button('Delete', [
                'class' => 'compact red small del-row',
                'data' => [
                    'modelclass' => $listModelClass
                ],
                'style' => 'display : none'
            ]);
        echo Elements::button('Add Row', [
                'class' => 'compact small add-row',
                'data'  => [
                    'modelclass' => $listModelClass,
                    'formview' => $formView,
                ]
            ]);
    endif ?>
</div>