<?php

namespace crudle\setup\models;

use crudle\setup\enums\Status_Transaction;
use crudle\setup\enums\Type_Permission;
use crudle\main\models\base\BaseActiveRecord;
use crudle\setup\enums\Permission_Group;
use Yii;

/**
 * This is the model class for table "app_module".
 */
class AppModule extends BaseActiveRecord
{
    public string   $controllerNamespace = 'crudle\\setup\\controllers';
    public array    $params = [];
    public string   $id = 'setup';
    // public yii\web\Application $module;
    public ?string  $layout = null;
    public array    $controllerMap = [];
    public string   $defaultRoute = 'setup';

    public function rules()
    {
        return [
            [
                'controllerNamespace',
                'params',
                'id',
                'layout',
                'controllerMap',
                'defaultRoute',
            ], 'safe'
        ];
    }

    public function attributeLabels()
    {
        return [
            'controllerNamespace'   => Yii::t('app', 'Controller namespace'),
            'params'    => Yii::t('app', 'Params'),
            'id'    => Yii::t('app', 'Id'),
            'layout'    => Yii::t('app', 'Layout'),
            'controllerMap' => Yii::t('app', 'Controller map'),
            'defaultRoute'  => Yii::t('app', 'Default route'),
        ];
    }

    // Workflow Interface
    public function hasWorkflow()
    {
        return false;
    }

    public static function permissions()
    {
        return Type_Permission::enums(Permission_Group::Crud);
    }

    public static function enums()
    {
        return [
            'status' => Status_Transaction::class
        ];
    }
}
