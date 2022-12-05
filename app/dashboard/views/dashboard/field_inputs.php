<?php

use crudle\app\enums\Type_Module;
use crudle\app\main\helpers\App;
use crudle\app\dashboard\models\DashboardWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use icms\FomanticUI\modules\Select;

if (isset($this->context->getDetailModels()['widgets']))
    $modelsId = 'widgets';
else // id changes on validation
    $modelsId = 'DashboardWidget';
?>
<div class="ui padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'module')->widget(Select::class, [
                    'search' => true,
                    'items' => ArrayHelper::merge([' ' => ''], App::getModuleList()),
                    'options' => [
                        'id' => 'rb__module',
                        'class' => 'load-related-list-options',
                        'data' => [
                            'url' => Url::to(['load-models-by-module']),
                            'dependent_field_count' => 'many',
                            'dependent_field_ref' => 'rb--model-name',
                        ]
                    ]
                ]) ?>
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
                                'modelClass' => DashboardWidget::class
                            ]),
        'collapsible'   => false,
        'expanded'      => true,
    ]) ?>
<?php
$this->registerJs($this->render('@appMain/views/_form_field/load_related_list_options.js'));