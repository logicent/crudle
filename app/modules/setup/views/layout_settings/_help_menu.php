<?php

echo $this->render('@app_main/views/_form_section/item', [
        'model' => $model->helpMenu,
        'form' => $form,
        'formView' => '@app_setup/views/layout_settings/_menu/field_inputs',
        'listColumns' => '@app_setup/views/layout_settings/_menu/list_columns',
        'listId' => 'help__menu',
    ]) ?>