<?php

use crudle\app\setup\models\AppHelpMenu;

echo $this->render('@appMain/views/_form_section/item', [
    'modelClass' => AppHelpMenu::class,
]);