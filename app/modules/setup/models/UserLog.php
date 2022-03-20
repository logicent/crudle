<?php

namespace app\modules\setup\models;

use app\enums\Status_Active;
use app\models\auth\UserLog as AuthUserLog;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_log".
 */
class UserLog extends AuthUserLog
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'id'; // override in view index
    }

    // public function rules()
    // {
    //     $rules = parent::rules();

    //     return ArrayHelper::merge([
    //     ], $rules);
    // }

    // public function attributeLabels()
    // {
    //     $attributeLabels = parent::attributeLabels();

    //     return ArrayHelper::merge([
    //     ], $attributeLabels);
    // }

    // ActiveRecord Interface
    public static function enums()
    {
        return [
            'status' => Status_Active::class,
        ];
    }
}
