<?php

namespace crudle\app\main\controllers\action;

use yii\base\Action;

class PrintAction extends Action
{
    public function run()
    {
        $this->sidebar = false;

        return $this->render('/main/blank', [
            'message' => 'To be implemented',
        ]);
    }
}