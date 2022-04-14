<?php

use app\modules\setup\models\AppMenuAlert;

echo $this->render('@app_main/views/_form_section/item', [
        'model' => new AppMenuAlert(),
        'detailModels' => $this->context->detailModels()['alertMenu'],
        'form' => $form,
        'formView' => '@app_setup/views/layout_settings/_menu/field_inputs',
        'listColumns' => '@app_setup/views/layout_settings/_menu/list_columns',
        'listId' => 'alert_menu',
    ]) ?>