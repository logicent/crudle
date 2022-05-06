<?php

namespace crudle\app\main\controllers\action;

use Yii;
use yii\base\Action;
use yii\helpers\Json;

class DeleteRowAction extends Action
{
    public function run()
    {
        if ( Yii::$app->request->isAjax )
        {
            $modelClass = $this->modelClass . Yii::$app->request->post('modelType');
            $model = $modelClass::findOne(Yii::$app->request->post('modelId'));
            if ( !$model )
                return Json::encode(['exists' => false]);

            if ($model->delete() > 0)
            {
                // if ( $model->allowFileUpload() && isset( $model->{ $model->fileAttribute } ))
                //     $files = explode(',', $model->{ $model->fileAttribute });
                //     if ( !empty($files) )
                //         if ( is_array( $files ))
                //             foreach ( $files as $file )
                //                 FileHelper::unlink( Yii::getAlias('@webroot/uploads/') . $file );
                //         else
                //             FileHelper::unlink( Yii::getAlias('@webroot/uploads/') . $this->model->{ $model->fileAttribute } );
                // Yii session success message
                return Json::encode(['succeeded' => true]);
            }
            // Yii session failed message
            return Json::encode(['failed' => true]);
        }
        // else
        Yii::$app->end();
    }
}