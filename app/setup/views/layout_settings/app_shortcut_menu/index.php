<?php

use crudle\app\setup\models\AppShortcutMenu;

echo $this->render('@appMain/views/_form_table/item', [
    'modelClass' => AppShortcutMenu::class,
]);