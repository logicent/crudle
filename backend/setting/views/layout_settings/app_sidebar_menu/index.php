<?php

use crudle\app\setting\models\AppSidebarMenu;

echo $this->render('@appMain/views/_form_table/item', [
    'modelClass' => AppSidebarMenu::class,
]);