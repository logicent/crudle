<?php

use yii\helpers\Html;
use icms\FomanticUI\widgets\ActiveForm;
use icms\FomanticUI\Elements;

use crudle\app\main\models\GlobalSearch;

$model = new GlobalSearch;
?>

<div class="item" id="search_form">
<!-- onsubmit="return false;" -->
<?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'class' => 'ui form',
            'autocomplete' => 'off'
        ]
    ]) ?>
    <div class="ui icon large input">
        <?= Html::activeTextInput($model, 'gs_term', ['placeholder' => Yii::t('app', 'Search or type a command')]) ?>
        <?= Elements::icon('search small link') ?>
    </div>
<?php ActiveForm::end() ?>

</div>
