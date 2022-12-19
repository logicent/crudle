<?php

use crudle\app\setting\models\AppShortcutMenu;

echo $this->render('@appMain/views/_form_table/item', [
    'modelClass' => AppShortcutMenu::class,
]);