<?php

echo "<?php\n";
?>

namespace crudle\ext\<?= $generator->moduleID ?>\enums;

use Yii;

class Type_Sub_Module
{
    // const Sub_Module = 'Sub Module';

    public static function enums()
    {
        return [
            // self::Sub_Module => Yii::t('app', 'Sub Module'),
        ];
    }

    public static function enumIcons()
    {
        return [
            // self::Sub_Module => 'options',
        ];
    }
}