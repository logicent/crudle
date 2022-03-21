<?php

namespace app\modules\website\models;

use app\enums\Status_Active;
use app\modules\setup\models\ListViewSettingsForm;
use app\modules\website\models\base\BasePersonInfo;
use Yii;
use yii\helpers\ArrayHelper;

class BlogWriter extends BasePersonInfo
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'full_name'; // override in view index
    }

    public static function tableName()
    {
        return 'site_post_author';
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'date_published' => Yii::t('app', 'Date published')
        ]);
    }

    public static function enums()
    {
        return [
            'inactive' => Status_Active::class
        ];
    }
}
