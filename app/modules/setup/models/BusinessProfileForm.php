<?php

namespace app\modules\setup\models;

use app\modules\setup\models\base\BaseSettingsForm;
use Yii;

class BusinessProfileForm extends BaseSettingsForm
{
    public $name;
    public $short_name;
    public $location;
    public $contacts;
    public $logoPath;
    public $website;
    public $emailAddress;

    public function init()
    {
        $this->uploadForm = new \app\models\UploadForm();
        $this->fileAttribute = 'logoPath';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [[
                'logoPath', 
                'short_name', 
                'location', 
                'contacts', 
            ], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'short_name' => Yii::t('app', 'Short name'),
            'name' => Yii::t('app', 'Business name'),
            'logoPath' => Yii::t('app', "Business logo"),
            'location' => Yii::t('app', 'Physical address'),
            'contacts' => Yii::t('app', 'Contacts'),
        ];
    }
}
