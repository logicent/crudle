<?php

use yii\helpers\StringHelper;

echo "<?php\n";
?>

use crudle\app\user\enums\Type_Role;
use crudle\ext\<?= StringHelper::basename($generator->modulePath) ?>\enums\Type_Menu_Sub_Group;

$this->params['menuGroupClass'] = Type_Menu_Sub_Group::class;

return [
    [
        'route' => '/<?= $generator->moduleID ?>/<?= $generator->moduleID ?>/index',
        'label' => '<?= $generator->getModuleClass() ?>',
        'group' => Type_Menu_Sub_Group::<?= $generator->getModuleClass() ?>,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>
