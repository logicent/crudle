<?php

namespace crudle\main\models\auth;

use Yii;

/**
 * This is the model class for table "auth".
 *
 * @property User $user
 */
class Auth extends User
{
    public $password;
    public $new_password;
    // public $logout_from_all_devices_after_password_change = true;
    public $send_welcome_email;
    public $send_password_update_notification;

    // Security Settings (Global vs per User)
    // simultaneous_sessions
    // restrict_ip - 1 or comma-separated
    // last_ip
    // last_active
    // last_login
    // login_after 0-24
    // login_before 0-24
    // Type_User - see Type_User::enums()

    // Third-party Authentication (provider, username, user_id)
    // API Access (api_key, api_secret) 
    // e.g. f1bd2bb1db79c1d (not regenerated), Save API Secret: 60927479bba179c (not visible later)

    public function rules()
    {
        return [
            [['id', 'username', 'auth_key', 'email'], 'required'],
            [['password', 'new_password', 'created_at', 'updated_at'], 'safe'],
            [['id'], 'string', 'max' => 20],
            [['username', 'password'], 'string', 'min' => 4, 'max' => 20],
            [['username', 'email'], 'string', 'max' => 140],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['status'], 'string'],
            ['email', 'email'],
            [['email','username'], 'unique'],
            [['email', 'username'], 'filter', 'filter' => 'trim'],
            // [['password_reset_token'], 'unique'], // require in reset only

            ['status', 'default', 'value' => User::STATUS_ACTIVE],
            ['status', 'in', 'range' => [User::STATUS_ACTIVE, User::STATUS_DELETED]],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth key'),
            'password_hash' => Yii::t('app', 'Password hash'),
            'password_reset_token' => Yii::t('app', 'Password reset token'),
            'email' => Yii::t('app', 'Primary email'),
            'send_welcome_email' => Yii::t('app', 'Send welcome email'),
            'status' => Yii::t('app', 'Active'),
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id']);
    }

    public function getPerson()
    {
        return $this->hasOne(Person::class, ['id' => 'id']);
    }

    public function getStatusLabel()
    {
        if ($this->status == parent::STATUS_ACTIVE)
            $this->status = '<span class="ui mini green empty circular label"></span>&nbsp;' . Yii::t('app', 'Active');
        else
            $this->status = '<span class="ui mini red empty circular label"></span>&nbsp;' . Yii::t('app', 'Deleted');
    }
}
