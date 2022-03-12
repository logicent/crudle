<?php

namespace app\modules\setup\models;

use app\enums\Status_Active;
use app\models\base\BaseActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "email_template".
 */
class EmailTemplate extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'email_template';
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
