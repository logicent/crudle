<?php

use crudle\app\setup\models\AppCreateMenu;

echo $this->render('@appMain/views/_form_section/item', [
        'model' =>  new AppCreateMenu(),
        'detailModels' => $this->context->getDetailModels()['createMenu'],
        'form' => $form,
        'formView' => '@appSetup/views/_menu/field_inputs',
        'listColumns' => '@appSetup/views/_menu/list_columns',
        'listId' => 'create_menu',
    ]) ?>