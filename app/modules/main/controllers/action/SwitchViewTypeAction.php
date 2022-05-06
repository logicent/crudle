<?php

namespace crudle\app\main\controllers\action;

use yii\base\Action;

class SwitchViewTypeAction extends Action
{
    public function run($name)
    {
        return $this->controller->render('@app_main/views/_' . $name . '/index');
    }
}