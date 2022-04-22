<?php

use crudle\setup\enums\Type_Role;
use _sample\enums\Type_Menu_Sub_Group;

$this->params['menuGroupClass'] = Type_Menu_Sub_Group::class;

return [
    [
        'route' => '/_sample/_sample/index',
        'label' => '_Sample',
        'group' => Type_Menu_Sub_Group::Group,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>
