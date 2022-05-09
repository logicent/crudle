<?php

use crudle\app\setup\models\AppMenuAlert;

echo $this->render('@appMain/views/_form_section/item', [
        'model' => new AppMenuAlert(),
        'detailModels' => $this->context->getDetailModels()['alertMenu'],
        'form' => $form,
        'formView' => '@appSetup/views/_menu/field_inputs',
        'listColumns' => '@appSetup/views/_menu/list_columns',
        'listId' => 'alert_menu',
    ]) ?>