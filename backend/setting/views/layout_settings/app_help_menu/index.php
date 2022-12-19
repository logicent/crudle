<?php

use crudle\app\setting\models\AppHelpMenu;

echo $this->render('@appMain/views/_form_table/item', [
    'modelClass' => AppHelpMenu::class,
]);