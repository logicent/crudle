<?php

use app\modules\setup\models\AppMenuSidebar;

echo $this->render('@app_main/views/_form_section/item', [
        'model' =>  new AppMenuSidebar(),
        'detailModels' => $this->context->detailModels()['sidebarMenu'],
        'form' => $form,
        'formView' => '@app_setup/views/_menu/field_inputs',
        'listColumns' => '@app_setup/views/_menu/list_columns',
        'listId' => 'sidebar_menu',
    ]) ?>