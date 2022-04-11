<?php

echo $this->render('@app_main/views/_form_section/item', [
        'model' => $model->createMenu,
        'form' => $form,
        'formView' => '@app_setup/views/layout_settings/_menu/field_inputs',
        'listColumns' => '@app_setup/views/layout_settings/_menu/list_columns',
        'listId' => 'create__menu',
    ]) ?>