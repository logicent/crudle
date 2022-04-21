<?php

namespace website\models;

use app\enums\Status_Active;
use crudle\setup\enums\Permission_Group;
use crudle\setup\enums\Type_Permission;
use crudle\setup\models\ListViewSettingsForm;
use website\models\base\BasePersonInfo;
use Yii;
use yii\helpers\ArrayHelper;

class BlogWriter extends BasePersonInfo
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'full_name'; // override in view index
    }

    public static function tableName()
    {
        return 'site_post_author';
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'date_published' => Yii::t('app', 'Date published')
        ]);
    }

    public static function permissions()
    {
        return array_merge(
            Type_Permission::enums(Permission_Group::Crud),
            Type_Permission::enums(Permission_Group::Data),
        );
    }

    public static function enums()
    {
        return [
            'status' => [
                'class' => Status_Active::class,
                'attribute' => 'inactive'
            ]
        ];
    }
}
