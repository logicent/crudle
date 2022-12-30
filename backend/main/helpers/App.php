<?php

namespace crudle\app\main\helpers;

use crudle\app\main\enums\Module_Alias;
use crudle\app\crud\models\ActiveRecord;
use crudle\app\crud\models\ActiveRecordDetail;
use crudle\app\setting\enums\Type_Model;
use Yii;
use yii\helpers\ArrayHelper;
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
    public static $modules = [];
    public static $models = [];

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

    public static function getModuleList($pathAlias = Module_Alias::Ext)
    {
        $path = Yii::getAlias($pathAlias);
        $dirs = FileHelper::findDirectories($path, ['recursive' => false]);

        $modules = [];
        foreach ($dirs as $dir)
        {
            if (!file_exists($dir . '/Module.php'))
                continue;
            $moduleDirname = StringHelper::basename($dir);
            $config = require $dir . '/config.php';
            $modules[$config['id']] = Inflector::camel2words(Inflector::id2camel($config['id']));
        }
        return $modules;
    }

    public static function getModules($pathAlias = Module_Alias::Ext, $activated = true)
    {
        self::$modules = [];

        $path = Yii::getAlias($pathAlias);
        $dirs = FileHelper::findDirectories($path, ['recursive' => false]);

        foreach ($dirs as $dir) {
            if (!file_exists($dir . '/Module.php'))
                continue;
            $moduleDirname = StringHelper::basename($dir);
            $modulePath = $path . '/' . $moduleDirname;
            $ns = "crudle\\" . Module_Alias::nsPathname()[$pathAlias] . "\\" . $moduleDirname;
            $class = $ns . "\\Module";
            // check if module is activated
            $module = Yii::createObject($class);
            if ((bool) $module->isActivated !== $activated)
                continue;
            $config = require $dir . '/config.php';
            self::$modules[] = [
                'id' => $config['id'],
                'name' => $module->moduleName, // will be $module->name
                'ns' => $ns,
                'class' => $class,
                'path' => $modulePath,
            ];
        }
        return new self;
    }

    public static function getModule($moduleId, $pathAlias = Module_Alias::Ext)
    {
        self::$modules = [];

        $path = Yii::getAlias($pathAlias . '/' . $moduleId);
        if (!file_exists($path . '/Module.php'))
            return new self;

        $dirname = StringHelper::basename($path);
        $pathname = Module_Alias::nsPathname()[$pathAlias];
        $ns = "crudle\\" . $pathname . "\\" . $dirname;
        $class = $ns . "\\Module";
        $config = require $path . '/config.php';

        self::$modules[] = [
            'id' => $config['id'],
            'ns' => $ns,
            'class' => $class,
            'path' => $path,
        ];
        return new self;
    }

    public static function getModulePaths($pathAlias = Module_Alias::Ext)
    {
        $path = Yii::getAlias($pathAlias);
        return FileHelper::findDirectories($path, ['recursive' => false]);
    }

    public static function getModuleOf($modelName)
    {
        $groupedModels = self::getModules(Module_Alias::Ext)->getModels();

        foreach ($groupedModels as $moduleId => $models)
            $groupedModels[$moduleId] = array_flip($models);

        foreach ($groupedModels as $moduleId => $models) {
            if (isset($models[Inflector::camel2words($modelName)]))
                return $moduleId;
        }
        return false;
    }

    public static function getModelNames($includeChildModels = false, $flattenArray = false)
    {
        foreach (self::$modules as $id => $module)
        {
            $dir = $module['path'] . '/models';
            if (!is_dir($dir))
                continue;
            $files = FileHelper::findFiles($dir, ['recursive' => false]);
            sort($files);
            foreach ($files as $file)
            {
                $modelClassname = StringHelper::basename($file, '.php');
                $modelClass = $module['ns'] . "\\models\\" . $modelClassname;
                // check if modelClass is a ActiveRecord class
                $model = new $modelClass();
                if (! $model InstanceOf ActiveRecord)
                    continue;
                // check if modelClass is a ActiveRecordDetail class
                if ($includeChildModels)
                    if (! $model InstanceOf ActiveRecordDetail)
                        continue;
                $modelName = Inflector::camel2words($modelClassname);
                self::$models[$module['id']][$modelName] = $modelName;
            }
        }
        return $flattenArray ? self::flattenArray(self::$models) : self::$models;
    }

    public static function getModels($includeChildModels = false, $flattenArray = false)
    {
        foreach (self::$modules as $id => $module)
        {
            $dir = $module['path'] . '/models';
            if (!is_dir($dir))
                continue;
            $files = FileHelper::findFiles($dir, ['recursive' => false]);
            sort($files);
            foreach ($files as $file)
            {
                $modelClassname = StringHelper::basename($file, '.php');
                $modelClass = $module['ns'] . "\\models\\" . $modelClassname;
                // check if modelClass is a ActiveRecord class
                $model = new $modelClass();
                if (! $model InstanceOf ActiveRecord)
                    continue;
                // check if modelClass is a ActiveRecordDetail class
                if ($includeChildModels)
                    if (! $model InstanceOf ActiveRecordDetail)
                        continue;
                self::$models[$module['id']][$modelClass] = Inflector::camel2words($modelClassname);
            }
        }
        return $flattenArray ? self::flattenArray(self::$models) : self::$models;
    }

    public static function flattenArray($array = null)
    {
        $result = [];

        if (!is_array($array)) {
            $array = func_get_args();
        }

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, self::flattenArray($value));
            } else {
                $result = array_merge($result, [$key => $value]);
            }
        }
        return $result;
    }

    public static function getAllModels()
    {
        $userModels = self::getModules()->getModels($includeChildModels = false, $flattenArray = true);
        $coreModels = array_flip(Type_Model::modelClasses());

        return ArrayHelper::merge($userModels, $coreModels);
    }
}
