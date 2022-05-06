<?php

namespace crudle\app\helpers;

use yii\helpers\Url;

class ActionUrl
{
    public function get()
    {
        return 
            Url::to([
                $this->context->action->id,
                'id' => $this->id,
            ]);
    }

    // Person

    // public $myAccountRoute;
    // public $myAccountRouteParam;
    // public $myAccountRouteParamValue;

    // $myRouteAction = Yii::$app->user->can( RoleType::SystemManager ) || 
    // Yii::$app->user->can(RoleType::Administrator) ? 'update' : 'view';

    // if ($myRouteAction == 'view')
    // {
    // $this->myAccountRouteParam = 'email';
    // $this->myAccountRouteParamValue = Yii::$app->user->identity->email;
    // }
    // else {
    // $this->myAccountRouteParam = 'id';
    // $this->myAccountRouteParamValue = Yii::$app->user->id;
    // }

    // $this->myAccountRoute = 'user/' . $myRouteAction;
}