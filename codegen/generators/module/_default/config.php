<?php
/**
 * This is the template for generating a module config file.
 */

use yii\helpers\StringHelper;

$moduleDir = StringHelper::basename($generator->moduleClass);

echo "<?php\n";
?>

return [
    // 'controllerNamespace' => 'modules\<?= $moduleDir ?>\controllers',
    // 'params' => [],
    'id' => '<?= $generator->moduleID ?>',
    // 'layout' => 'main',
    // 'controllerMap' => [],
    'defaultRoute' => '<?= $generator->moduleID ?>', // !! MUST be set

    // 'basePath' => '@extModules/<?= $moduleDir ?>',
    // 'controllerPath' => '@extModules/<?= $moduleDir ?>/controllers'
    // 'viewPath' => '@extModules/<?= $moduleDir ?>/views',
    // 'layoutPath' => '@appMain/views/_layouts',
];
