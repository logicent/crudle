<?php
/**
 * This is the template for generating a module config file.
 */

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

$moduleDir = StringHelper::basename($generator->moduleClass);

echo "<?php\n";
?>

return [
    // 'controllerNamespace' => 'crudle\ext\<?= $generator->moduleID ?>\controllers',
    // 'params' => [],
    'id' => '<?= $generator->moduleID ?>',
    // 'layout' => 'main',
    // 'controllerMap' => [],
    'defaultRoute' => '<?= Inflector::camel2id($generator->getModuleClass()) ?>', // !! MUST be set

    // 'basePath' => '@extModules/<?= $generator->moduleID ?>',
    // 'controllerPath' => '@extModules/<?= $generator->moduleID ?>/controllers'
    // 'viewPath' => '@extModules/<?= $generator->moduleID ?>/views',
    // 'layoutPath' => '@appMain/layouts',
];
