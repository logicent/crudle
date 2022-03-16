<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="<?= $this->context->id ?>-search">
<?php
    $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'class' => 'ui form',
            'autocomplete' => 'off'
        ]
    ]) ?>

    <!-- insert search form fields -->
    <?= $this->renderFile($this->context->viewPath . '/_search.php', [
            'form' => $form,
            'searchModel' => $searchModel
        ]) ?>

    <div style="margin-top: 1em">
        <?= Html::resetButton(Yii::t('app', 'Clear'), ['class' => 'compact ui basic small button']) ?>
        <?= Html::submitButton(Yii::t('app', 'Apply Filter'), ['class' => 'compact ui basic small primary button']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>