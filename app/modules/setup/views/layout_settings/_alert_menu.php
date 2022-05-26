<?php

use crudle\app\setup\models\AppAlertMenu;

echo $this->render('@appMain/views/_form_section/item', [
        'model' => new AppAlertMenu(),
        'detailModels' => $this->context->getDetailModels()['alertMenu'],
        'form' => $form,
        'formView' => '@appSetup/views/_menu/field_inputs',
        'listColumns' => '@appSetup/views/_menu/list_columns',
        'listId' => 'alert_menu',
    ]) ?>