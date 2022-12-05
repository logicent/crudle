<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

$moduleDir = StringHelper::basename($generator->modulePath);
$moduleName = Inflector::camelize($moduleDir);

echo "<?php\n";
?>

namespace crudle\ext\<?= $moduleDir ?>\enums;

use crudle\app\main\enums\Type_Menu_Group;
use yii\helpers\ArrayHelper;
use Yii;

class Type_Menu_Sub_Group extends Type_Menu_Group
{
    const <?= $moduleName ?> = '<?= $moduleName ?>';

    public static function enums()
    {
        return ArrayHelper::merge([
            self::<?= $moduleName ?> => Yii::t('app', '<?= Inflector::camel2words($moduleName) ?>'),
        ], parent::enums());
    }

    public static function enumIcons()
    {
        return ArrayHelper::merge([
            self::<?= $moduleName ?> => 'options',
        ], parent::enums());
    }
}
