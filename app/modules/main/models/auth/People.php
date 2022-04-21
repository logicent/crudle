<?php

namespace crudle\main\models\auth;

use app\enums\Status_Person;
use crudle\main\models\base\BaseActiveRecord;
use Yii;

/**
 * This is the model class for view "people".
 *
 * @property Auth $auth
 */
class People extends BaseActiveRecord
{
    public $full_name;

    public static function tableName()
    {
        return 'people';
    }

    public function attributeLabels()
    {
        return [
            'full_name' => Yii::t('app', 'Full name'),
            'status' => Yii::t('app', 'Status'),
            'user_role' => Yii::t('app', 'User role'),
            'user_group' => Yii::t('app', 'User group'),
            'sex' => Yii::t('app', 'Sex'),
            'personal_email' => Yii::t('app', 'Personal email'),
            'mobile_no' => Yii::t('app', 'Mobile no'),
            'official_status' => Yii::t('app', 'Work status'),
            'title_of_courtesy' => Yii::t('app', 'Title of courtesy'),
        ];
    }

    public function afterFind()
    {
        $this->full_name = $this->firstname . BaseActiveRecord::SpaceChar . $this->surname;

        return parent::afterFind();
    }

    // ActiveRecord Interface
    public static function enums()
    {
        return [
            'status' => Status_Person::class,
        ];
    }
}
