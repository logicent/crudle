<?php

use crudle\app\setup\models\AppAlertMenu;

echo $this->render('@appMain/views/_form_section/item', [
    'modelClass' => AppAlertMenu::class,
]);