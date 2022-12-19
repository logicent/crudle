<?php

$this->title = Yii::t('app', 'Dashboards');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashboards'), 'url' => ['/dashboards']];

?>

<?= $this->render('_widget/index', ['models' => $model->dashboardWidget]) ?>
