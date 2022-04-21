<?php

namespace website\models\base;

use crudle\main\models\UploadForm;
use crudle\setup\models\base\BaseSettingsForm;
use Yii;

class BasePersonInfo extends BaseSettingsForm
{
    public $fullName;
    public $designation;
    public $imageLink;
    public $bio;
    public $inactive;

    public function init()
    {
        $this->uploadForm = new UploadForm();
        $this->fileAttribute = 'imageLink';
    }

    public function rules()
    {
        return [
            [['fullName'], 'required'],
            [['inactive'], 'boolean'],
            [['fullName', 'designation', 'imageLink'], 'string', 'max' => 140],
            [['bio'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'fullName' => Yii::t('app', 'Full name'),
            'designation' => Yii::t('app', 'Designation'),
            'imageLink' => Yii::t('app', 'Image link'),
            'bio' => Yii::t('app', 'Bio'),
            'inactive' => Yii::t('app', 'Inactive'),
        ];
    }
}
