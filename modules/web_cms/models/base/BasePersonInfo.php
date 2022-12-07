<?php

namespace crudle\ext\web_cms\models\base;

use crudle\app\upload\forms\UploadForm;
use crudle\app\setup\models\base\BaseSettingsForm;
use Yii;

class BasePersonInfo extends BaseSettingsForm
{
    public $fullName;
    public $designation;
    public $photoImage;
    public $bio;
    public $inactive;

    public function init()
    {
        $this->uploadForm = new UploadForm();
        $this->fileAttribute = 'photoImage';
    }

    public function rules()
    {
        return [
            [['fullName'], 'required'],
            [['inactive'], 'boolean'],
            [['fullName', 'designation', 'photoImage'], 'string', 'max' => 140],
            [['bio'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'fullName' => Yii::t('app', 'Full name'),
            'designation' => Yii::t('app', 'Designation'),
            'photoImage' => Yii::t('app', 'Photo image'),
            'bio' => Yii::t('app', 'Bio'),
            'inactive' => Yii::t('app', 'Inactive'),
        ];
    }
}
