<?php

namespace crudle\app\crud\controllers\action;

use Yii;
use yii\base\Action;

class Create extends Action
{
    public function run($id = null)
    {
        $controller = $this->controller;
        // Yii::$app->request->isGet && $id
        if ( $id ) {
            // 1a. duplicate model on get request if id != null
            // 1b. get related models if loading forms
            $this->copyModel( $id );
        }
        // Yii::$app->request->isPost || Yii::$app->request->isGet && !$id
        else {
            // 1a. create model instance and initialize detailModels
            $modelClass = $controller->modelClass();
            $controller->setModel(new $modelClass());
            $model = $controller->getModel();
            // 1b. set the FK if applicable
            if ( Yii::$app->request->isGet ) {
                // check for additional query params via Ajax request
                if ( !empty(Yii::$app->request->queryParams) )
                    $model->attributes = Yii::$app->request->queryParams;

                if ( !empty( $model->foreignKeyAttribute() ))
                    $model->{ $model->foreignKeyAttribute() } = Yii::$app->request->get( $model->foreignKeyAttribute() );
            }
        }
        // 1c. autosuggest id value if applicable
        if ( $model->autoSuggestIdValue() )
            $model->{$model::autoSuggestAttribute()} = $model->autoSuggestId();

        // 2. save if request is via post
        if ( Yii::$app->request->isPost )
            return $controller->saveModel(); // store data

        // 3. load the view response
        return $controller->loadView(); // show view
    }

    protected function copyModel( $id, $includeDetails = true )
    {
        $controller = $this->controller;

        $modelClass = $controller->modelClass();
        $controller->setModel(new $modelClass());
        $sourceModel = $controller->getModel();
        $sourceDetailModels = $sourceModel->links();

        $targetModel = new $this->modelClass();
        $targetModel = $this->modelClass::loadDuplicateValues( $sourceModel, $targetModel );
        $targetModel->isCopyRecord = true;

        if ( $includeDetails )
            $targetModel->copyDetailModels = $sourceDetailModels;
    }

}
