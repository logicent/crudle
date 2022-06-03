<?php

echo "<?php\n";
?>

namespace crudle\ext\<?= $generator->moduleID ?>\enums;

use crudle\app\main\enums\Type_Menu_Group;
use Yii;

class Type_Menu_Sub_Group extends Type_Menu_Group
{
    const <?= $generator->moduleClass ?> = '<?= $generator->moduleClass ?>';

    public static function enums()
    {
        return [
            self::<?= $generator->moduleClass ?> => Yii::t('app', '<?= $generator->moduleClass ?>'),
        ];
    }

    public static function enumIcons()
    {
        return [
            self::<?= $generator->moduleClass ?> => 'options',
        ];
    }
}