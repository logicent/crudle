<?php

namespace crudle\app\main\controllers\action;

use yii\base\Action;

class SwitchViewType extends Action
{
    public function run($name)
    {
        return $this->controller->render('@appMain/views/_' . $name . '/index');
    }
}