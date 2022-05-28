<?php

namespace crudle\ext\web_cms\models;

use crudle\app\enums\Status_Active;
use crudle\app\main\models\ActiveRecord;
use crudle\app\setup\enums\Permission_Group;
use crudle\app\setup\enums\Type_Permission;
use crudle\app\setup\models\ListViewSettingsForm;
use crudle\ext\web_cms\models\base\BasePersonInfo;
use Yii;
use yii\helpers\ArrayHelper;

class BlogWriter extends ActiveRecord
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

    public function rules()
    {
        return [
            ['full_name', 'required'],
            [[
                'designation', 'image_link', 'route'
            ], 'string', 'max' => 140],
            ['bio', 'string', 'max' => 280],
            ['inactive', 'boolean'],
            ['date_published', 'date', 'format' => 'yyyy-mm-dd'],
        ];
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
