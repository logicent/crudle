<?php

use crudle\setup\models\AppMenuAlert;

echo $this->render('@app_main/views/_form_section/item', [
        'model' => new AppMenuAlert(),
        'detailModels' => $this->context->detailModels()['alertMenu'],
        'form' => $form,
        'formView' => '@app_setup/views/_menu/field_inputs',
        'listColumns' => '@app_setup/views/_menu/list_columns',
        'listId' => 'alert_menu',
    ]) ?>