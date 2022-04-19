<?php

use crudle\setup\models\AppMenuShortcut;

echo $this->render('@app_main/views/_form_section/item', [
        'model' =>  new AppMenuShortcut(),
        'detailModels' => $this->context->detailModels()['shortcutMenu'],
        'form' => $form,
        'formView' => '@app_setup/views/_menu/field_inputs',
        'listColumns' => '@app_setup/views/_menu/list_columns',
        'listId' => 'shortcut_menu',
    ]) ?>