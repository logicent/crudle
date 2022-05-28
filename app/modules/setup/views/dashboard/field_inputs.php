<?php

use crudle\app\enums\Type_Module;
use crudle\app\setup\models\DashboardWidget;


if (isset($this->context->getDetailModels()['widgets']))
    $modelsId = 'widgets';
else // id changes on validation
    $modelsId = 'DashboardWidget';
?>
<div class="ui padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'module')->dropDownList(Type_Module::enums()) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'inactive')->checkbox(['class' => 'toggle'])->label('&nbsp;') ?><br>
            <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="ui one column grid">
        <div class="column">
            <?= $form->field($model, 'heading')->textInput(['maxlength' => true]) ?>
            <?= $this->render('@appMain/views/_form_field/rich_text_editor', [
                    'model' => $model,
                    'form' => $form,
                    'attribute' => 'description',
                ]) ?>
        </div>
    </div>
</div>

<?= $this->render('@appMain/views/_form/_section', [
        'title'         => Yii::t('app', 'Widgets'),
        'content'       => $this->render('@appMain/views/_form_section/item', [
                                'form' => $form,
                                'model' => new DashboardWidget(),
                                'detailModels' => $this->context->getDetailModels()[$modelsId],
                                'formView' => '@appSetup/views/dashboard/_widget/field_inputs',
                                'listColumns' => '@appSetup/views/dashboard/_widget/list_columns',
                                'listId' => 'dashboard_widget',
                            ]),
        'collapsible'   => false,
        'expanded'      => true,
    ]) ?>
