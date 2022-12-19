<?php

use crudle\app\setting\models\AppAlertMenu;

echo $this->render('@appMain/views/_form_table/item', [
    'modelClass' => AppAlertMenu::class,
]);