<?php

$this->title = Yii::t('app', 'Data Import');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tool'), 'url' => ['/tool']];

?>

<div class="data-tool-index">

    <?= $this->render('_form', [
        'model' => $model,
        'import_errors' => $import_errors,
    ]) ?>

</div>
