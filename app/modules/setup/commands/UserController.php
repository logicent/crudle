<?php
namespace app\modules\setup\commands;

use app\modules\setup\enums\Status_User;
use app\modules\main\models\auth\Auth;
use app\modules\setup\enums\Type_Role;
use app\modules\main\models\auth\Person;
use Yii;
use yii\console\Controller;
use yii\helpers\Inflector;

class UserController extends Controller
{
    public function actionCreateSuperuser($pwd)
    {
        $transaction = Yii::$app->db->beginTransaction();

        try {
            // Create default super user i.e. System Administrator
            $auth = new Auth();
            $person = new Person();

            // required fields
            $auth->id = Yii::$app->security->generateRandomString(6);
            $auth->username = Type_Role::Administrator;
            $auth->setPassword($pwd);
            $auth->email = 'admin@example.com';
            // reason ?
            // $auth->auth_key = Yii::$app->security->generateRandomString();
            $auth->generateAuthKey();

            if (!$auth->validate())
            {
                \Kint::dump($auth->errors);
                exit;
            }
            // else
            // set the blameable columns values
            $auth->updated_by = $auth->created_by = $auth->id; 
            $auth->save(false);

            $person->id = $auth->id;
            $person->user_role = Type_Role::Administrator;
            $person->firstname = 'Super';
            $person->surname = 'Man';
            $person->status = 0; // inactive false
            // BlameableBehavior in BaseAR overwrites updated_by
            $person->updated_by = $person->created_by = $person->id;

            if (!$person->validate())
            {
                \Kint::dump($person->errors);
                exit;
            }
            // else
            $person->save(false);

            $transaction->commit();

        } catch (\yii\db\Exception $e) {
            $transaction->rollBack();
            echo $e->errorInfo[2];
            exit;
        }
        return $auth->id;
    }

    public function actionCreateUser($name, $pwd, $email, $user_role = null)
    {
        $transaction = Yii::$app->db->beginTransaction();

        try {
            $auth = new Auth();
            $person = new Person();
            // required fields
            $auth->id = Yii::$app->security->generateRandomString(6);
            $auth->username = $name;
            $auth->setPassword($pwd);
            $auth->email = $email;
            // reason ?
            $auth->generateAuthKey();

            if ($auth->validate())
                $auth->save(false);
            else
                \Kint::dump(Yii::t('app', 'Auth validation error encountered'), $auth->errors);

            $person->id = $auth->id;
            $person->user_role = $user_role;
            $person->firstname = Inflector::humanize($name);
            $person->surname = '<Not specified>';
            $person->created_at = $person->updated_at = date(time());
            
            if ($person->validate())
                $person->save(false);
            else
                \Kint::dump(Yii::t('app', 'Person data validation error encountered'), $person->errors);

            $transaction->commit();

        } catch (\yii\db\IntegrityException $e) {
            $transaction->rollBack();
            echo $e->errorInfo[2];
            exit;
        }
        // Send email notification if true and email is provided
        return $auth->id;
    }

    public function actionAssignRole($name, $roleName)
    {
        $auth = Auth::findOne(['username' => $name]);

        $role = Yii::$app->authManager->getRole($roleName);
        if (Yii::$app->authManager->assign($role, $auth->id))
            return Yii::t('app', 'Role change succeeded');
        // else
        return Yii::t('app', 'Role change failed');
    }

    public function actionChangePwd($name, $new_pwd, $old_pwd = null, $send_email_notification = false)
    {
        $auth = Auth::findOne(['username' => $name]);
        // To-Do: check if old password is correct
        $auth->setPassword($new_pwd);
        if ($auth->save(false))
            return Yii::t('app', 'Password change succeeded');
        // else
        return Yii::t('app', 'Password change failed');
    }

    public function actionChangeStatus(string $name, bool $status)
    {
        $auth = Auth::findOne(['username' => $name]);
        $auth->status = Status_User::enums()[$status];

        if ($auth->save(false))
            return Yii::t('app', 'User status change succeeded');
        // else
        return Yii::t('app', 'User status change failed');
    }

}
