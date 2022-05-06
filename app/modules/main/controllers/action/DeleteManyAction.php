<?php

namespace crudle\app\main\controllers\action;

use Yii;
use yii\helpers\Json;

class DeleteManyAction extends DeleteAction
{
    public function run($id)
    {
        $result = $errors = $messages = null;
        $id_list = Json::decode( Yii::$app->request->post('id_list') );

        foreach ( $id_list as $id )
        {
            // 1. use parent controller
            $controller = $this->controller;
            // a. create main model instance
            $model = $controller->getModel($id);
            $detailModels = $controller->getDetailModels();
            $this->deleteModels( $model, $detailModels );
        }

        // if ( !empty( $result ) )
        //     $messages[] = $result . ' rows have been deleted.';

        // if ( !empty( $errors ) )
        //     $messages[] = $errors . ' rows could not be deleted';

        if (Yii::$app->request->isAjax)
            return $this->controller->asJson( ['success' => true] );
        else
            return $this->controller->redirect(['index']);
    }
}