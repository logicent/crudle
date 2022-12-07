<?php

namespace crudle\app\comment\controllers\action;

use Yii;
use yii\base\Action;

class ShowCommentModal extends Action
{
    public function run()
    {
        if (Yii::$app->request->isAjax); {
            return $this->controller->renderAjax('@appMain/views/_form/_comment_modal', [
                'url'   => Yii::$app->request->get('url'),
                'new_status' => Yii::$app->request->get('new_status'),
                'require_comment' => Yii::$app->request->get('require_comment')
            ]);
        }
        // else
        Yii::$app->end();
    }
}