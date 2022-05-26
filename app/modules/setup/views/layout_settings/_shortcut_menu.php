<?php

use crudle\app\setup\models\AppShortcutMenu;

echo $this->render('@appMain/views/_form_section/item', [
        'model' =>  new AppShortcutMenu(),
        'detailModels' => $this->context->getDetailModels()['shortcutMenu'],
        'form' => $form,
        'formView' => '@appSetup/views/_menu/field_inputs',
        'listColumns' => '@appSetup/views/_menu/list_columns',
        'listId' => 'shortcut_menu',
    ]) ?>