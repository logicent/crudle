<?php

echo $this->render('@app_main/views/_form_section/item', [
        'model' => $model->shortcutMenu,
        'form' => $form,
        'formView' => '@app_setup/views/layout_settings/_menu/field_inputs',
        'listColumns' => '@app_setup/views/layout_settings/_menu/list_columns',
        'listId' => 'shortcut_menu',
    ]) ?>