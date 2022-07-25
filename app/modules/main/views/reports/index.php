<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Report');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['/app/report']];
?>

<div id="report" class="active ui tab">
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