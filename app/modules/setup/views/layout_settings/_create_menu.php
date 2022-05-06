<?php

use crudle\app\setup\models\AppMenuCreate;

echo $this->render('@app_main/views/_form_section/item', [
        'model' =>  new AppMenuCreate(),
        'detailModels' => $this->context->getDetailModels()['createMenu'],
        'form' => $form,
        'formView' => '@app_setup/views/_menu/field_inputs',
        'listColumns' => '@app_setup/views/_menu/list_columns',
        'listId' => 'create_menu',
    ]) ?>