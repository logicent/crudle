<?php

namespace website\models;

use app\enums\Status_Active;
use crudle\main\models\base\BaseActiveRecord;
use crudle\setup\enums\Permission_Group;
use crudle\setup\enums\Type_Permission;

class BlogCategory extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'site_post_category';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
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
