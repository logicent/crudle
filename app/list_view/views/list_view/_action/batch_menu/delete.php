<?php

use icms\FomanticUI\Elements;
use yii\helpers\Url;

// if ( Yii::$app->user->can( Type_Permission::Delete .' '. $controller->viewName() ) ) :
    echo Elements::button(Yii::t('app', 'Delete'), [
        'id' => 'delete_btn',
        'class' => 'compact primary',
        'data' => [
            'method' => 'post',
            'url' => Url::to(['delete-many']),
            // remove if custom modal works or use return false to override confirm dialog
            'confirm' => Yii::t('app', 'Confirm you want to delete the selected rows?'),
        ],
        'style' => 'display: none'
    ]);
// endif;
echo $this->render('@appMain/views/_modal/confirm_action', ['action' => 'Delete']); // ?
echo $this->render('_confirm_delete');