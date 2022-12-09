<?php

namespace crudle\app\crud\controllers\action;

use crudle\app\crud\enums\Type_Comment;
use crudle\app\crud\forms\CommentForm;
use Yii;
use yii\base\Action;

class SaveComment extends Action
{
    public function run($id)
    {
        $controller = $this->controller;

        if (Yii::$app->request->isAjax); {
            // 1. create comment model instance
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