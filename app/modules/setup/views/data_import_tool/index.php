<?php

$this->title = Yii::t('app', 'Data Import Tool');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];

?>

<div class="data-tool-index">

    <?= $this->render('_form', [
        'model' => $model,
        'import_errors' => $import_errors,
    ]) ?>

</div>
