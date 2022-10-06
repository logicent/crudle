<?php

use crudle\app\setup\models\AppShortcutMenu;

echo $this->render('@appMain/views/_form_section/item', [
    'modelClass' => AppShortcutMenu::class,
]);