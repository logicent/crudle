<?php

namespace crudle\app\main\controllers\action;

use Yii;
use yii\base\Action;

class Delete extends Action
{
    public function run($id)
    {
        // 1. use parent controller
        $controller = $this->controller;
        // a. create main model instance
        $model = $controller->getModel($id);
        $detailModels = $controller->getDetailModels();

        $this->deleteModels( $model, $detailModels );
    }

    protected function deleteModels( $model, $detailModels )
    {
        // b. create detail models instances
        $messages = [];

        foreach ( $detailModels as $details )
        {
            // delete sibling model or one-to-one
            if ( !is_array( $details ))
            {
                // soft delete
                // $details->deleted_at = date('Y-m-d H:i:s');
                // $details->save(false);
                // hard delete
                // if ( $details->delete() !== false )
                //     $messages['success'][$details->id] = $details->id . ' has been deleted successfully';
                // else
                //     $messages['error'][$details->id] = $details->id . ' could not be deleted';
            }
            // delete child model or one-to-many
            foreach ( $details as $detailModel )
            {
                // soft delete
                // if (property_exists($detailModel, 'deleted_at'))
                // {
                //     $detailModel->deleted_at = date('Y-m-d H:i:s');
                //     $detailModel->save(false);
                // }
                // hard delete
                // if ( $detailModel->delete() !== false )
                //     $messages['success'][$detailModel->id] = $detailModel->id . ' has been deleted successfully';
                // else
                //     $messages['error'][$detailModel->id] = $detailModel->id . ' could not be deleted';
            }
        }
        // soft delete
        // $model->deleted_at = date('Y-m-d H:i:s');
        // $model->save(); // false
        // hard delete
        // if ( $model->delete() !== false )
        // {
        //     // $messages['success'][$model->id] = $model->id . ' has been deleted permanently';
        //     Yii::$app->session->setFlash( 'success', 
        //         Yii::t('app', $this->viewName() .' '. $model->id . ' has been deleted permanently') );
        // }
        // else
        //     // $messages['error'][$model->id] = $model->id . ' could not be deleted';
        //     Yii::$app->session->setFlash( 'error', 
        //         Yii::t('app', $this->viewName() .' '. $model->id . ' could not be deleted') );
        return $this->controller->redirect(['index']);
    }
}
