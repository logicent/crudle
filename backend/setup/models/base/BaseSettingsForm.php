<?php

namespace crudle\app\setup\models\base;

use crudle\app\user\enums\Type_Permission;
use crudle\app\setup\models\Settings;
use Yii;
use yii\base\Model;
use yii\helpers\Json;
use yii\web\UploadedFile;


abstract class BaseSettingsForm extends Model implements SettingsInterface
{
    public $createdAt, $updatedAt;
    public $createdBy, $updatedBy;
    public $uploadForm, $fileAttribute;

    public function rules()
    {
        return [
            [['createdAt', 'updatedAt'], 'integer'],
            [['createdBy', 'updatedBy'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'createdAt' => Yii::t('app', 'Created at'),
            'createdBy' => Yii::t('app', 'Created by'),
            'updatedAt' => Yii::t('app', "Updated at"),
            'updatedBy' => Yii::t('app', "Updated by"),
        ];
    }

    public static function permissions()
    {
        return [
            Type_Permission::Create => Type_Permission::Create,
            Type_Permission::Update => Type_Permission::Update,
        ];
    }

    public function populateAttributes( $settings )
    {
        foreach ( $settings as $setting )
        {
            if (property_exists($this, $setting['attribute_name']))
                $this->{$setting['attribute_name']} = $setting['attribute_value'];

            if ($this::hasMixedValueFields() && in_array($setting['attribute_name'], $this::mixedValueFields()))
                $this->{$setting['attribute_name']} = Json::decode($setting['attribute_value']);
        }
    }

    public function save( $modelClassname )
    {
        if (!is_null($this->uploadForm))
        {
            $fileObj = UploadedFile::getInstance($this->uploadForm, 'file_upload');

            if (!empty($fileObj))
            {
                $this->uploadForm->file_upload = $fileObj;
                // if saveAs succeeded file_path is returned else false
                $this->{$this->fileAttribute} = $this->uploadForm->upload();
            }
        }

        $rowCount = 0;

        foreach ($this->attributes as $attribute => $value)
        {
            if ($attribute == 'uploadForm' || is_object($value))
                continue;

            $settings = Settings::findOne(['model_name' => $modelClassname, 'attribute_name' => $attribute]);
            if (is_null($settings))
            {
                $settings = new Settings();
                $settings->id = uniqid();
                $settings->model_name = $modelClassname;
                $settings->attribute_name = $attribute;

                if ($attribute == 'createdBy')
                    $value = Yii::$app->user->id;

                if ($attribute == 'createdAt')
                    $value = date(time());
            }
            else {
                if ($attribute == 'updatedBy')
                    $value = Yii::$app->user->id;

                if ($attribute == 'updatedAt')
                    $value = date(time());
            }

            $settings->attribute_value = is_array($value) ? implode(',', $value) : $value;

            // $settings->save(); // !!! This does NOT work reliably for comma-separated values
            $rowCount += Yii::$app->db
                            ->createCommand()
                            ->upsert(
                                Settings::tableName(),
                                $settings->attributes
                            )
                            ->execute();
        }
        if ($rowCount > 0)
            return true;
        // else
        return false;
    }

    public static function hasMixedValueFields(): bool
    {
        return false;
    }

    public static function mixedValueFields(): array
    {
        return [];
    }

    public static function relations(): array
    {
        return [];
    }
}
