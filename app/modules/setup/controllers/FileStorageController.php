<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\BaseViewController;


class FileStorageController extends BaseViewController
{
    public function actions()
    {
        return [
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}