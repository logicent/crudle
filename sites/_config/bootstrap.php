<?php

use crudle\app\main\helpers\App;

$siteId = App::env('SITE_ID');

Yii::setAlias('@usrModules', "@crudle/sites/{$siteId}/modules");
