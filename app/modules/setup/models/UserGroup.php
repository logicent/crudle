<?php

namespace app\modules\setup\models;

use app\enums\Status_Active;
use app\models\base\BaseActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_group".
 */
class UserGroup extends BaseActiveRecord
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'id'; // override in view index
    }

    public static function tableName()
    {
        return 'user_group';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
        ], $rules);
    }

    public function attributeLabels()
    {
        return [
        ];
    }

    // ActiveRecord Interface
    public static function enums()
    {
        return [
            'status' => Status_Active::class,
        ];
    }
}
