<?php

// use crudle\app\setting\models\Setup;
// use crudle\ext\web_cms\models\WebsiteSettingsForm;

$this->beginContent('@extModules/web_cms/layouts/base.php') ?>
<!-- Header -->
<?= $this->render('site/_header') ?>
<div class="pusher">
    <!-- Page Contents -->
    <?= $content ?>
    <!-- Footer -->
    <?= $this->render('site/_footer') ?>
</div>
<?php
$this->endContent() ?>
