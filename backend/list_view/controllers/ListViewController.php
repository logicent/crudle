<?php

namespace crudle\app\list_view\controllers;

use crudle\app\list_view\controllers\action\Batch;
use crudle\app\list_view\controllers\action\Index;
use crudle\app\list_view\controllers\action\MyListViewSettings;
use crudle\app\list_view\controllers\ListViewInterface;
use crudle\app\main\controllers\base\ViewController;
use crudle\app\user\enums\Type_Permission;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

abstract class ListViewController extends ViewController implements ListViewInterface
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
            'index'                 => Index::class,
            'batch'                 => Batch::class,
            'my-list-view-settings' => MyListViewSettings::class,
            'switch-view-type'      => SwitchViewType::class,
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