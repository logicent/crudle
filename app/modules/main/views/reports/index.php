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
<div class="ui tab active segment" style="margin-left: 120px;">

<?php
if (in_array('dataProvider', array_keys(get_defined_vars()))) :
    echo $this->render('_list/index', [
            'dataProvider' => $dataProvider,
            'reportTitle' => $model->title,
            'hideId' => true,
            'columns' => [], // $columns
    ]);
endif ?>
</div>
<?php
$this->registerJs(<<<JS
    $('.ui.image').transition({
        animation : 'pulse',
        duration  : 800
    });
JS);
