<?php

namespace crudle\app\auth\forms;

use yii\base\Model;

/**
 * ChangePwdForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class ChangePwdForm extends Model
{
    public $new_password;
    public $send_password_change_notification = true;
    // Logout From All Devices After Changing Password
    public $logout_from_all_devices_after_change = true;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['new_password'], 'required'],
            ['send_password_change_notification', 'logout_from_all_devices_after_change',
            'boolean'],
        ];
    }
}
