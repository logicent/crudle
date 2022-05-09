<?php

use crudle\app\setup\models\AppMenuSidebar;

echo $this->render('@appMain/views/_form_section/item', [
        'model' =>  new AppMenuSidebar(),
        'detailModels' => $this->context->getDetailModels()['sidebarMenu'],
        'form' => $form,
        'formView' => '@appSetup/views/_menu/field_inputs',
        'listColumns' => '@appSetup/views/_menu/list_columns',
        'listId' => 'sidebar_menu',
    ]) ?>