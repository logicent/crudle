<?php

echo "<?php\n";
?>

namespace crudle\enums;

use Yii;

class Type_Menu_Sub_Group
{
    // const Group = 'Group';

    public static function enums()
    {
        return [
            // self::Group => Yii::t('app', 'Group'),
        ];
    }

    public static function enumIcons()
    {
        return [
            // self::Group => 'options',
        ];
    }
}