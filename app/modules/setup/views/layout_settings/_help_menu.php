<?php

use crudle\app\setup\models\AppMenuHelp;

echo $this->render('@appMain/views/_form_section/item', [
        'model' =>  new AppMenuHelp(),
        'detailModels' => $this->context->getDetailModels()['helpMenu'],
        'form' => $form,
        'formView' => '@appSetup/views/_menu/field_inputs',
        'listColumns' => '@appSetup/views/_menu/list_columns',
        'listId' => 'help_menu',
    ]) ?>