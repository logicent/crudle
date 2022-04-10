<?php

use app\modules\setup\models\AppMenuForm;


echo $this->render('@app_main/views/_form_section/item', [
        'model' => $model,
        'modelClass' => AppMenuForm::class,
        'form' => $form,
        'formView' => '@app_setup/views/layout_settings/_menu/field_inputs',
        'listColumns' => '@app_setup/views/layout_settings/_menu/list_columns',
        'listId' => 'create__menu',
    ]) ?>