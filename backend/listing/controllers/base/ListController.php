<?php

namespace crudle\app\listing\controllers\base;

use crudle\app\listing\controllers\action\Batch;
use crudle\app\listing\controllers\action\Index;
use crudle\app\listing\controllers\action\MyListSettings;
use crudle\app\listing\controllers\base\ListInterface;
use crudle\app\main\controllers\base\ViewController;
use crudle\app\user\enums\Type_Permission;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

abstract class ListController extends ViewController implements ListInterface
{
    public function behaviors()
    {
        $modelClassname = StringHelper::basename($this->modelClass());
        $modelName = Inflector::camel2words($modelClassname);

        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => [ Type_Permission::List .' '. $modelName ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                    'delete-many' => ['POST'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return array_merge(parent::actions(), [
            'index'             => Index::class,
            'batch'             => Batch::class,
            'my-list-settings'  => MyListSettings::class,
            'switch-view-type'  => SwitchViewType::class,
        ]);
    }

    // ListViewInterface
    public function listRouteId(): string
    {
        return $this->id . '/update';
    }

    public function listRouteParams(): array
    {
        return [];
    }

    public function showBatchActions(): bool
    {
        return true;
    }

    public function batchActionsMenu(): array
    {
        return [];
    }
}