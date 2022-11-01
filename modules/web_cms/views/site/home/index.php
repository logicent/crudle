<?php

$this->title = Yii::t('app', 'Home');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Home'), 'url' => ['/home']];

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => '' // fetch from route meta in setup
]);
// author
// description
// generator
// keywords
// viewport
?>

<!-- To-Do: support inverted and color combo -->
<div class="ui inverted vertical masthead center aligned segment">
    <!-- Page Menu -->
    <?= $this->render('@extCms/views/_layouts/site/_navbar') ?>

    <div class="ui text container">
        <h1 class="ui inverted header">
        Let every transaction flow - without compromise
        </h1>
        <h2>Kenya's smartest enterprise platform.</h2>
        <div class="ui huge primary button">Get Started <i class="right arrow icon"></i></div>
    </div>
</div>

<div class="ui vertical stripe segment">
    <div class="ui middle aligned stackable grid container">
        <div class="row">
            <div class="eight wide column">
                <h3 class="ui header">Powerful non-profit apps</h3>
                <p>Exceptional planning and first class reporting on top of everything you require from real-time apps.</p>
                <h3 class="ui header">Proven enterprise systems</h3>
                <p>Full-featured, customizable and extendable systems for service, retail and manufacturing businesses.</p>
            </div>
            <div class="six wide right floated column">
                <img src="<?= Yii::getAlias('_cms_assets/images/wireframe/white-image.png') ?>" class="ui large bordered rounded image">
            </div>
        </div>
        <div class="row">
            <div class="center aligned column">
                <a href="/#demos" class="ui huge button">Check Them Out</a>
            </div>
        </div>
    </div>
</div>

<div class="ui vertical stripe quote segment">
    <div class="ui equal width stackable internally celled grid">
        <div class="center aligned row">
            <div class="column">
                <h3>"We achieved our system upgrade objectives"</h3>
                <p><b>Denis</b> Executive Director, Youth Alive Kenya</p>
            </div>
            <div class="column">
                <h3>"I got value for money on the project deliverable."</h3>
                <p>
                    <img src="<?= Yii::getAlias('_cms_assets/images/avatar/nan.jpg') ?>" class="ui avatar image"> 
                    <b>Kemuma</b> Director, Zuriel Fresh Farm Ltd
                </p>
            </div>
        </div>
    </div>
</div>

<div class="ui vertical stripe segment">
    <div class="ui text container">
        <h3 class="ui header">Monitoring & Evaluation</h3>
        <p>Track your project activities and outcomes without loosing your mind on the record-keeping and reporting.</p>
        <a class="ui large button">Read More</a>
        <h3 class="ui horizontal header divider">
            <a href="#">Work Portfolio</a>
        </h3>
        <h3 class="ui header">ERP/Accounting for Business & Non-Profit</h3>
        <p>We implement tried and tested systems for your to meet your operational and managerial requirements.</p>
        <a class="ui large button">I'm Quite Interested</a>
    </div>
</div>
