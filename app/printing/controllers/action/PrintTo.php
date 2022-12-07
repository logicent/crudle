<?php

namespace crudle\app\printing\controllers\action;

use yii\base\Action;

class PrintTo extends Action
{
    public function run()
    {
        $this->sidebar = false;

        return $this->render('/main/blank', [
            'message' => 'To be implemented',
        ]);
    }
}