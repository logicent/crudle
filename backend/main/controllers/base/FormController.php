<?php

namespace crudle\app\main\controllers\base;

// use yii\filters\AccessControl;

abstract class FormController extends ViewController implements FormInterface
{
    // public function behaviors()
    // {
    //     return [
    //         'access' => [
    //             'class' => AccessControl::class,
    //             'only' => ['index'],
    //             'rules' => [
    //                 [
    //                     'actions' => ['index'],
    //                     'allow' => true,
    //                     // 'roles' => [ Type_Permission::SubmitForm .' '. $this->viewName() ],
    //                 ],
    //             ],
    //         ],
    //     ];
    // }

    public function formModelClass(): string
    {
        return '';
    }
}
