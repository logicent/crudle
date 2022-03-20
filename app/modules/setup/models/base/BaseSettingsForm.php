<?php

namespace app\modules\setup\models\base;

use app\modules\setup\enums\Type_Permission;
use app\modules\setup\models\Setup;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

abstract class BaseSettingsForm extends Model
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
        return Type_Permission::enums();
    }

    public function populateAttributes( $settings )
    {
        foreach ( $settings as $setting )
            if (property_exists($this, $setting['attribute_name']))
                $this->{$setting['attribute_name']} = $setting['attribute_value'];
    }

    public function save( $modelClassname )
    {
        if (!is_null($this->uploadForm))
        {
            $fileObj = UploadedFile::getInstance($this->uploadForm, 'file_upload');

            if (!empty($fileObj))
            {
                $this->uploadForm->file_upload = $fileObj;
                $this->{$this->fileAttribute} = $this->uploadForm->upload(); // if saveAs succeeded file_path is returned else false
            }
        }

        $rowCount = 0;

        foreach ($this->attributes as $attribute => $value)
        {
            if ($attribute == 'uploadForm')
                continue;

            $setup = Setup::findOne(['model_name' => $modelClassname, 'attribute_name' => $attribute]);

            if (is_null($setup))
            {
                $setup = new Setup();
                $setup->id = uniqid();
                $setup->model_name = $modelClassname;
                $setup->attribute_name = $attribute;

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

            $setup->attribute_value = is_array($value) ? implode(',', $value) : $value;
            // $setup->save(); // !!! This does NOT work reliably for comma-separated values

            $rowCount += Yii::$app->db
                            ->createCommand()
                            ->upsert(
                                Setup::tableName(),
                                $setup->attributes
                            )
                            ->execute();
        }
        if ($rowCount > 0)
            return true;
        // else
        return false;
    }
}
