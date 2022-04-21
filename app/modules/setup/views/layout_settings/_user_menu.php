<?php

use crudle\setup\models\AppMenuUser;

echo $this->render('@app_main/views/_form_section/item', [
        'model' =>  new AppMenuUser(),
        'detailModels' => $this->context->getDetailModels()['userMenu'],
        'form' => $form,
        'formView' => '@app_setup/views/_menu/field_inputs',
        'listColumns' => '@app_setup/views/_menu/list_columns',
        'listId' => 'user_menu',
    ]) ?>