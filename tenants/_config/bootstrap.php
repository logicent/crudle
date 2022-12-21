<?php

use crudle\app\main\helpers\App;

$tenantId = App::env('TENANT_ID');

Yii::setAlias('@usrModules', "@crudle/tenants/{$tenantId}/modules");
