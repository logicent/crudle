<?php

namespace crudle\app\workflow\controllers\action;

use crudle\app\crud\enums\Type_Comment;
use crudle\app\crud\forms\CommentForm;
use crudle\app\workflow\enums\Status_Transaction;
use Yii;
use yii\base\Action;
use yii\helpers\Url;

class UpdateStatus extends Action
{
    public function run($id)
    {
        // 1. use parent controller
        $controller = $this->controller;
        // a. create main model instance
        $model = $controller->getModel($id);

        if (Yii::$app->request->isAjax) {
            $oldStatus = $model->status;
            $model->status = Yii::$app->request->post('new_status');

            if ($model->save()) {
                // add a comment for this status change
                $comment = new CommentForm();
                $comment->comment = "Changed the $this->viewName() status from <b> $oldStatus </b> to <b> {$model->status} </b>";
                $comment->save($model, true, Type_Comment::ChangeLog);

                // add message to email queue if applicable
                if ($model->allowSendEmail())
                    $model->sendNotificationIf($model, Url::to(['read', 'id' => $model->id]));

                // add a user comment if required for this status change
                // TODO: check from model not post ??
                if (Yii::$app->request->post('require_comment') == 'true') {
                    $comment = new CommentForm;
                    $comment->comment = Yii::$app->request->post('comment_text');
                    $comment->save($model, true, Type_Comment::UserNote);
                }
                Yii::$app->session->setFlash(
                    'success',
                    Yii::t('app', 'New status was changed successfully')
                );
                // TODO: show flash message and update sidebar via ajax - Turbolinks ?
                return $controller->redirect(['update', 'id' => $model->id]);
                // It works but will not update the sidebar or show the flash message
                // maybe use window.location.reload() after ajax succeeded?
                $model->refresh();
                // Try render and update the whole page
                return $controller->renderAjax('_form', [
                    'model' => $model,
                ]);
            }
            // else
            return $controller->asJson(['failed' => true, 'errors' => $model->errors]);
        }
        Yii::$app->end();
    }
}