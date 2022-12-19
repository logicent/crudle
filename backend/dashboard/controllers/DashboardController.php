<?php

namespace crudle\app\dashboard\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\app\user\enums\Type_Permission;
use crudle\app\dashboard\models\Dashboard;
use crudle\app\dashboard\models\search\DashboardSearch;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class DashboardController extends CrudController
{
    // public function behaviors()
    // {
    //     $modelName = 'Dashboard';

    //     return [
    //         'access' => [
    //             'class' => AccessControl::class,
    //             'only' => ['create', 'read', 'update', 'delete'],
    //             'rules' => [
    //                 [
    //                     'actions' => ['read'],
    //                     'allow' => true,
    //                     'roles' => [ Type_Permission::Read .' '. $modelName ],
    //                 ],
    //                 [
    //                     'actions' => ['update'],
    //                     'allow' => true,
    //                     'roles' => [ Type_Permission::Update .' '. $modelName ],
    //                     // 'roleParams' => function() {
    //                     //     return ['model' => Person::findOne(Yii::$app->request->get('id'))];
    //                     // },
    //                     // 'matchCallback' => function ($rule, $action)
    //                     // {
    //                     //     $this->model = Person::findOne(Yii::$app->request->get('id'));
    //                     //     return  Yii::$app->user->can('Update Own Person', ['model' => $this->model]);
    //                     // }
    //                 ],
    //                 [
    //                     'actions' => ['create'],
    //                     'allow' => true,
    //                     'roles' => [ Type_Permission::Create .' '. $modelName ],
    //                 ],
    //                 [
    //                     'actions' => ['delete', 'delete-many'],
    //                     'allow' => true,
    //                     'roles' => [ Type_Permission::Delete .' '. $modelName ],
    //                 ],
    //             ],
    //         ],
    //         'verbs' => [
    //             'class' => VerbFilter::class,
    //             'actions' => [
    //                 'delete' => ['POST'],
    //                 'delete-many' => ['POST'],
    //             ],
    //         ],
    //     ];
    // }

    // public function actions()
    // {
    //     return [
    //         'index' => Index::class,
    //     ];
    // }

    public function modelClass(): string
    {
        return Dashboard::class;
    }

    public function searchModelClass(): string
    {
        return DashboardSearch::class;
    }
}
