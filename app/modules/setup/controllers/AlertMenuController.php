<?php

namespace app\modules\setup\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\setup\models\AlertMenuForm;
use app\modules\setup\models\base\BaseAppMenuSearch;
use yii\filters\AccessControl;

class AlertMenuController extends BaseCrudController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function init()
    {
        $this->modelClass = AlertMenuForm::class;
        $this->modelSearchClass = BaseAppMenuSearch::class;
        
        return parent::init();
    }
}
