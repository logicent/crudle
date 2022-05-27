<?php

namespace crudle\app\helpers;

use crudle\app\main\models\ActiveRecord;
use crudle\app\main\models\Model;
use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Inflector;
use yii\helpers\Json;
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

    public static function classDisplayName($object)
    {
        return Inflector::camel2words(self::classBasename($object));
    }

    public static function convertArraysToModels($relationClass, $attributeValues)
    {
        $models = [];
        $attributeValues = empty($attributeValues) ? [] : $attributeValues;
        foreach ($attributeValues as $id => $attributeValue)
        {
            $relation = new $relationClass();
            $relation->attributes = $attributeValue;
            $models[] = $relation;
        }

        return $models;
    }

    public static function convertArrayToJson(&$model, $attribute)
    {
        if (empty($model->$attribute))
            return null;

        if ($model::hasMixedValueFields() && in_array($attribute, $model::mixedValueFields()))
            return $model->$attribute = empty($model->$attribute) ?: Json::encode($model->$attribute);
    }

    public static function getExtModules($pathAlias = '@extModules')
    {
        $extPath = Yii::getAlias($pathAlias);
        $extDirs = FileHelper::findDirectories($extPath, ['recursive' => false]);

        $modules = [];
        foreach ($extDirs as $extDir)
        {
            // check if sub dir is a module dir
            if (!file_exists($extDir . '/Module.php'))
                continue;
            $moduleDirname = StringHelper::basename($extDir);
            $config = require $extDir . '/config.php';
            // dynamically append module found in extPath
            $modules[$config['id']] = "crudle\\ext\\{$moduleDirname}\\Module";
        }

        return $modules;
    }

    public static function getExtModuleModels($moduleDir)
    {
        $files = FileHelper::findFiles($moduleDir);

        $models = [];
        foreach ($files as $file)
        {
            // check if file is a model or AR file
            if (! $file InstanceOf ActiveRecord && ! $file InstanceOf Model)
                continue;
            $moduleDirname = StringHelper::basename($moduleDir);
            $modelClass = get_called_class($file);
            // dynamically append model found in moduleDir
            // $models[] = "crudle\\ext\\{$moduleDirname}\\{$modelClass}";
            $models[] = $modelClass;
        }

        return $models;
    }
}