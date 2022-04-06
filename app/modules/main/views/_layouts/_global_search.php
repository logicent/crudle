<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;
use Zelenin\yii\SemanticUI\Elements;

use app\modules\main\models\GlobalSearch;

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
