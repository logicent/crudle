<?php

// $this->title = Yii::$app->params['appName'];
$this->title = Yii::t('app', 'Home');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Home'), 'url' => ['/home']];
?>

<?= $this->render('_menu') ?>