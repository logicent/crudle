<?php

use yii\helpers\StringHelper;

$moduleDir = StringHelper::basename($generator->modulePath);

echo "<?php\n";
?>

namespace crudle\ext\<?= $moduleDir ?>\enums;

// use crudle\ext\<?= $moduleDir ?>\models\<?= $generator->getModuleClass() ?>;

class Type_Model
{
    // const _Sample = '_Sample';

    public static function enums()
    {
        return [
            // self::_Sample =>  self::_Sample,
        ];
    }

    public static function modelClasses()
    {
        return [
            // self::_Sample => _Sample::class,
        ];
    }
}
