<?php

use crudle\app\setup\models\AppSidebarMenu;

echo $this->render('@appMain/views/_form_table/item', [
    'modelClass' => AppSidebarMenu::class,
]);