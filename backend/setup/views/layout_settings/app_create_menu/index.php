<?php

use crudle\app\setup\models\AppCreateMenu;

echo $this->render('@appMain/views/_form_table/item', [
    'modelClass' => AppCreateMenu::class,
]);