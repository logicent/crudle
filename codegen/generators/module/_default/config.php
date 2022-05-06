<?php
/**
 * This is the template for generating a module config file.
 */

echo "<?php\n";
?>

return [
    // 'controllerNamespace' => 'modules\<?= $generator->moduleID ?>\controllers',
    // 'params' => [],
    // 'id' => '<?= $generator->moduleID ?>',
    // 'layout' => 'main',
    // 'controllerMap' => [],
    'defaultRoute' => '<?= $generator->moduleID ?>', // !! MUST be set

    // 'basePath' => '@system_modules/<?= $generator->moduleID ?>',
    // 'controllerPath' => '@system_modules/<?= $generator->moduleID ?>/controllers'
    // 'viewPath' => '@system_modules/<?= $generator->moduleID ?>/views',
    // 'layoutPath' => '@app_main/views/_layouts',
];