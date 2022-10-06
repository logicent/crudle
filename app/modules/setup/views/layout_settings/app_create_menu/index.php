<?php

use crudle\app\setup\models\AppCreateMenu;

echo $this->render('@appMain/views/_form_section/item', [
    'modelClass' => AppCreateMenu::class,
]);