<?php

use icms\FomanticUI\Elements;
use yii\helpers\Url;

// if ( Yii::$app->user->can(Type_Permission::Create .' '. $controller->viewName()) ) :
    echo Elements::button(Yii::t('app', 'New'), [
            'id' => 'create_btn',
            'class' => 'compact primary',
            'data' => [
                'url' => Url::to(['create']),
                // pre-select-modal options
                // 'pre-select-modal' => $model->requirePreselectModal ? 'true' : 'false'
            ]
        ]);
// endif;