<?php

namespace crudle\ext\web_cms\models;

use crudle\app\main\enums\Status_Active;
use crudle\app\crud\models\ActiveRecord;
use crudle\app\user\enums\Permission_Group;
use crudle\app\user\enums\Type_Permission;

class BlogCategory extends ActiveRecord
{
    public function init()
    {
        parent::init();
        $this->listSettings->listIdAttribute = 'id';
        $this->listSettings->listNameAttribute = 'id';
    }

    public static function tableName()
    {
        return '{{%Site_Post_Category}}';
    }

    public function rules()
    {
        return [
            [['id'], 'required'],
            [['published'], 'boolean'],
            [['description', 'route'], 'string'],
        ];
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
                'attribute' => 'published'
            ]
        ];
    }
}
