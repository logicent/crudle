<?php

namespace crudle\app\main\models\auth;

use crudle\app\main\models\base\BaseActiveRecord;
use crudle\app\setup\enums\Type_Permission;
use Yii;

/**
 * This is the model class for table "user_log".
 *
 * @property Auth $auth
 */
class UserLog extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'user_log';
    }

    public function rules()
    {
        return [
            [['id', 'auth_id'], 'required'],
            [['status', 'login_at', 'logout_at', 'login_ip'], 'safe'],
            [['session_id'], 'string', 'max' => 140],
            [['login_ip'], 'string', 'max' => 128],
            // [['auth_id'], 'exist', 'skipOnError' => true, 'targetClass' => Auth::class, 'targetAttribute' => ['auth_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'auth_id' => Yii::t('app', 'Auth ID'),
            'session_id' => Yii::t('app', 'Session ID'),
            'login_at' => Yii::t('app', 'Login at'),
            'login_ip' => Yii::t('app', 'Login IP'),
            'logout_at' => Yii::t('app', 'Logout at'),
            'logout_ip' => Yii::t('app', 'Logout IP'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'auth_id']);
    }

    public function beforeSave( $insert )
    {
        if (! parent::beforeSave( $insert ))
            return false;
        // generate random Id for child tables only accessed via parent in views
        if ( $this->isNewRecord && empty( $this->id ))
            $this->id = uniqid();

        return true;
    }
}
