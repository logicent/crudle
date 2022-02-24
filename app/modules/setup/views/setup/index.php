<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Setup');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['/setup/setup']];
?>

<div id="setup" class="active ui tab">
    <?php
    if (!empty($model->bgImagePath)) :
        echo Html::img('@web/uploads/' . $model->bgImagePath, [
                'class' => 'ui centered image',
                'style' => "$model->bgImageStyles"
        ]);
    endif ?>
</div>

<?php 
$this->registerJs(<<<JS
    $('.ui.image').transition({
        animation : 'pulse',
        duration  : 800
    });
JS) ?>