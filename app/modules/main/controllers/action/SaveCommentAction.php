<?php

namespace crudle\app\main\controllers\action;

use crudle\app\main\enums\Type_Comment;
use crudle\app\main\models\CommentForm;
use Yii;
use yii\base\Action;

class SaveCommentAction extends Action
{
    public function run($id)
    {
        $controller = $this->controller;

        if (Yii::$app->request->isAjax); {
            // 1. create main model instance
            $model = $controller->getModel($id);

            $comment = new CommentForm();
            $comment->comment = Yii::$app->request->post('comment_text');
            $comment->save($model, false, Type_Comment::UserNote);

            $model->refresh(); // !! MUST do this to get an array in comments
            return $controller->renderPartial( $controller->commentView(), ['comments' => $model->comments]);
        }
        // else
        Yii::$app->end();
    }
}