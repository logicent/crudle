<?php

namespace app\helpers;

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/**
 * App helper.
 *
 * @author Logicent Ltd. <support@logicent.co>
 * @since 1.0.0
 */
class App
{
    /**
     * Returns an environment variable, checking for it in `$_SERVER` and calling `getenv()` as a fallback.
     *
     * @param string $name The environment variable name
     * @return string|array|false The environment variable value
     * @since 1.0.0
     */
    public static function env(string $name)
    {
        return $_SERVER[$name] ?? getenv($name);
    }

    public static function className($object)
    {
        return get_class($object);
    }

    public static function classBasename($object)
    {
        $class = self::className($object);
        return StringHelper::basename($class);
    }

    public function classDisplayName($object)
    {
        return Inflector::camel2words(self::classBasename($object));
    }
}