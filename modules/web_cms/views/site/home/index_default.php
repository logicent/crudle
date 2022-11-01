<?php

$this->title = Yii::t('app', 'Home');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Home'), 'url' => ['/home']];

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 
        'accounting, erp, dokos erp, erpnext, bakery management system, tour operator management system, 
         hotel management system, hotel front desk, property management, schools management, learning app,
         program management, project management, grants management, monitoring and evaluation, survey app,
         logistics, procurement, hr, payroll, retail, point of sale, policy tracker, contracts management',
]);
// author
// description
// generator
// keywords
// viewport
echo $this->render('_main_slide.php');