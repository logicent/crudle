<?php

echo "<?php\n";
?>

use crudle\app\setup\enums\Type_Role;
use <?= $generator->moduleID ?>\enums\Type_Menu_Sub_Group;

$this->params['menuGroupClass'] = Type_Menu_Sub_Group::class;

return [
    [
        'route' => '/<?= $generator->moduleID ?>/<?= $generator->moduleID ?>/index',
        'label' => '<?= $generator->getModuleClass() ?>',
        'group' => Type_Menu_Sub_Group::Group,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>
