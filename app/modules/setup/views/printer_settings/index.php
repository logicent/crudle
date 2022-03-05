<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;
use Zelenin\yii\SemanticUI\modules\Select;

$this->title = Yii::t('app', 'Printer Settings');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];

$form = ActiveForm::begin([
        'id' => $model->formName(),
        'options' => [
            'autocomplete' => 'off',
            'class' => 'ui form ajax-submit',
        ],
    ]) ?>

    <div class="ui attached padded segment">
        <div class="two fields">
            <?= $form->field($model, 'name')->textInput() ?>
            <?= $form->field($model, 'printerName')->textInput() ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'serverIP')->textInput() ?>
            <?= $form->field($model, 'port')->textInput() ?>
        </div>
    </div>
<?php 
ActiveForm::end();
$this->registerJs($this->render('//_form/_submit.js'));

$this->registerJs(<<<JS

JS);
