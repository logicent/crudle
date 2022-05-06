<?php

use crudle\app\setup\models\AppMenuHelp;

echo $this->render('@app_main/views/_form_section/item', [
        'model' =>  new AppMenuHelp(),
        'detailModels' => $this->context->getDetailModels()['helpMenu'],
        'form' => $form,
        'formView' => '@app_setup/views/_menu/field_inputs',
        'listColumns' => '@app_setup/views/_menu/list_columns',
        'listId' => 'help_menu',
    ]) ?>