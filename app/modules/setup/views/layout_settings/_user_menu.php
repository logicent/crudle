<?php

use crudle\app\setup\models\AppUserMenu;

echo $this->render('@appMain/views/_form_section/item', [
        'model' =>  new AppUserMenu(),
        'detailModels' => $this->context->getDetailModels()['userMenu'],
        'form' => $form,
        'formView' => '@appSetup/views/_menu/field_inputs',
        'listColumns' => '@appSetup/views/_menu/list_columns',
        'listId' => 'user_menu',
    ]) ?>