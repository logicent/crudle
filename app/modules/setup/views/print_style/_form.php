<?php

use app\enums\Type_Model;
use app\enums\Type_Module;
use app\enums\Type_Report;
use app\enums\Type_Role;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Select;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;


$modelClasses = array_merge(Type_Model::domainModelClass(), Type_Model::domainModelSubclass());
$modelClasses = array_flip($modelClasses);
ksort($modelClasses);

$form = ActiveForm::begin([
    'id' => $model->formName(),
    'enableClientValidation' => true,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form modal-form',
    ],
]);

echo $this->render('//_form/_modal_header', ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <div class="two fields">
            <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'inactive')->checkbox()->label('&nbsp;') ?>
        </div>
        <div class="two fields">
        </div>
        <div class="two fields">
        </div>
    </div>

    <div class="ui attached padded segment">
        <div class="two fields">
        </div>
    </div>

    <div class="ui attached padded segment">
    </div>

<?php ActiveForm::end();
echo $this->render('//_form/_footer', ['model' => $model]);
$this->registerJs($this->render('//_form/_modal_submit.js'));

$this->registerJs(<<<JS

JS);