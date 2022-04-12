<?php

echo $this->render('@app_main/views/_form_section/item', [
        'model' => $model->sidebarMenu,
        'form' => $form,
        'formView' => '@app_setup/views/layout_settings/_menu/field_inputs',
        'listColumns' => '@app_setup/views/layout_settings/_menu/list_columns',
        'listId' => 'sidebar_menu',
    ]) ?>