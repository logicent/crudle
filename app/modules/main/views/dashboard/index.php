<?php

$this->title = Yii::t('app', 'Dashboard');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashboard'), 'url' => ['/dashboard']];

?>

<?= $this->render('_widget/widget', ['stats' => $stats]) ?>
