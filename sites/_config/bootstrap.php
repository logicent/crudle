<?php

use crudle\app\main\helpers\App;

$tenantId = App::env('SITE_ID');

Yii::setAlias('@usrModules', "@crudle/sites/{$tenantId}/modules");
