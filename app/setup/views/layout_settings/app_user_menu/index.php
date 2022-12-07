<?php

use crudle\app\setup\models\AppUserMenu;

echo $this->render('@appMain/views/_form_table/item', [
    'modelClass' => AppUserMenu::class,
]);