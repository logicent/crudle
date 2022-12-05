<?php

use crudle\app\setup\models\AppUserMenu;

echo $this->render('@appMain/views/_form_section/item', [
    'modelClass' => AppUserMenu::class,
]);