<?php

namespace crudle\app\workflow\controllers;

use crudle\app\crud\controllers\action\Amend;
use crudle\app\crud\controllers\action\Cancel;
use crudle\app\crud\controllers\action\Submit;
use crudle\app\crud\controllers\CrudController;
use crudle\app\workflow\controllers\action\UpdateStatus;
use crudle\app\user\enums\Type_Permission;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

abstract class WorkflowCrudController extends CrudController
{
    public function behaviors()
    {
        $modelClassname = StringHelper::basename($this->modelClass());
        $modelName = Inflector::camel2words($modelClassname);

        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['amend', 'cancel', 'submit', 'update-status'],
                'rules' => [
                    [
                        'actions' => ['amend'],
                        'allow' => true,
                        'roles' => [ Type_Permission::Amend .' '. $modelName ],
                    ],
                    [
                        'actions' => ['cancel'],
                        'allow' => true,
                        'roles' => [ Type_Permission::Cancel .' '. $modelName ],
                    ],
                    [
                        'actions' => ['submit'],
                        'allow' => true,
                        'roles' => [ Type_Permission::Submit .' '. $modelName ],
                    ],
                    [
                        'actions' => ['update-status'],
                        'allow' => true,
                        'roles' => [ Type_Permission::Update .' '. $modelName ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'cancel' => ['POST'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'submit'        => Submit::class,
            'cancel'        => Cancel::class,
            'amend'         => Amend::class,
            'update-status' => UpdateStatus::class,
        ]);
    }

    // ViewInterface
    public function mainAction(): array
    {
        return [
            'update' => [
                'route' => 'submit',
                'label' => 'Submit',
            ],
            'cancel' => [
                'route' => 'amend',
                'label' => 'Amend',
            ],
            'amend' => [
                'route' => 'save',
                'label' => 'Save',
            ],
        ];
    }

    public function viewActions(): array
    {
        return [
            'index' => [
            ]
        ];
    }

    public function menuActions(): array
    {
        return [
        ];
    }

    public function userActions(): array
    {
        return [];
    }
}
