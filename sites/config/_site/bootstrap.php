<?php

use crudle\app\main\helpers\App;

$siteId = App::env('SITE_ID');

Yii::setAlias('@siteModules', "@crudle/sites/{$siteId}/modules");
