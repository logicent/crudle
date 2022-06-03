<?php

echo "<?php\n";
?>

namespace crudle\ext\<?= $generator->moduleID ?>\enums;

// use crudle\ext\<?= $generator->moduleID ?>\models\<?= $generator->getModuleClass() ?>;

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
