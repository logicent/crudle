<?php

namespace app\models\auth;

use app\models\base\BaseActiveRecordDetail;
use app\modules\setup\enums\Type_Permission;
use Yii;

/**
 * This is the model class for table "user_log".
 *
 * @property Auth $auth
 */
class UserLog extends BaseActiveRecordDetail
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
            'login_ip' => Yii::t('app', 'Login IP'),
            'login_at' => Yii::t('app', 'Login at'),
            'logout_at' => Yii::t('app', 'Logout at'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'auth_id']);
    }

    public static function permissions()
    {
        return Type_Permission::enums();
    }
}
