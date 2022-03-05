<?php

namespace app\controllers;

use app\controllers\base\BaseCrudController;
use app\enums\Type_Form_View;
use logicent\accounts\enums\Status_Party;
use app\enums\Status_User;
use app\models\auth\Auth;
use app\models\auth\Person;
use app\models\auth\PersonSearch;
use Yii;
use yii\helpers\Html;
use yii\helpers\Json;

class PeopleController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = Person::class;
        $this->modelSearchClass = PersonSearch::class;

        return parent::init();
    }

    public function actionRead($id)
    {
        $auth = Auth::findOne(['id' => $id]);
        $person = Person::findOne($auth->id);

        $authMan = Yii::$app->authManager;
        $roles = $authMan->getRolesByUser($auth->id);

        // $person->user_role will be overwritten because role assignments are inherited
        foreach ($roles as $id => $role)
            $person->user_role = $role->name;

        $auth->getStatusLabel();

        $this->model = $person;

        if (Yii::$app->request->isAjax)
            return $this->renderAjax('readonly', [
                'auth' => $auth,
                'person' => $person,
            ]);
        else
            return $this->render('readonly', [
                'auth' => $auth,
                'person' => $person,
            ]);
    }

    public function actionCreate($id = null)
    {
        $auth = new Auth();
        $person = new Person();

        if ( Yii::$app->request->post() )
        {
            $auth->id = Yii::$app->security->generateRandomString(6);
            $person->id = $auth->id;

            if ($auth->load( Yii::$app->request->post(), 'Auth') &&
                $person->load( Yii::$app->request->post(), 'Person')
            ){
                try {
                    if (empty($auth->password))
                        $auth->password = Yii::$app->security->generateRandomString(10);

                    $auth->setPassword( $auth->password );
                    $auth->auth_key = Yii::$app->security->generateRandomString();
    
                    if ($auth->validate() && $person->validate())
                    {
                        if ($auth->save(false)) {
                            if ( !empty( $person->avatar ) )
                                $person->avatar = $this->uploadFile( $person );

                            if ($auth->status == Status_User::Active)
                                $person->status = Status_Party::Yes;

                            if ($auth->status == Status_User::Deleted)
                                $person->status = Status_Party::No;

                            if ($person->save(false)) {
                                $authMan = Yii::$app->authManager;
                                $roles = Json::decode($person->user_role);
                                foreach ($roles as $role_name) {
                                    $role = $authMan->getRole( $role_name );
                                    $authMan->assign( $role, $auth->id );
                                }
                                if ( (bool) $auth->send_welcome_email )
                                    $this->_sendWelcomeMail(
                                        $auth->email,
                                        $auth->username,
                                        $auth->password
                                    );
                                Yii::$app->session->setFlash('success', 
                                    Yii::t('app', 'New User: # ' . $person->full_name . ' was created successfully'));

                                return $this->redirect(['index']);
                            }
                        }
                    }
                }
                catch (\yii\db\Exception $e)
                {
                    Yii::$app->session->setFlash('error', $e->errorInfo[2]);
                }
            }
            else {
                Yii::$app->session->setFlash('errors', 
                    \yii\helpers\ArrayHelper::merge( $auth->errors, $person->errors ));
            }
        }

        $this->model = $person;

        if (Yii::$app->request->isAjax)
            return $this->renderAjax('create', [
                'auth' => $auth,
                'person' => $person,
            ]);
        else
            return $this->render('create', [
                'auth' => $auth,
                'person' => $person,
            ]);
    }

    public function actionUpdate( $id )
    {
        $auth = Auth::findOne( $id );
        $person = Person::findOne( $auth->id );

        if ($auth->load(Yii::$app->request->post(), 'Auth') && $auth->validate())
            $auth->save(false);

        if ($person->load(Yii::$app->request->post(), 'Person') && $person->validate())
        {
            if ( !empty( $person->avatar ) )
                $person->avatar = $this->uploadFile( $person );

            if ($auth->status == Status_User::Active)
                $person->status = Status_Party::Yes;

            if ($auth->status == Status_User::Deleted)
                $person->status = Status_Party::No;

            $person->save(false);

            $authMan = Yii::$app->authManager;
            $roles = Json::decode($person->user_role);
            $authMan->revokeAll($auth->id);

            foreach ($roles as $role_name) {
                $role = $authMan->getRole($role_name);
                $authMan->assign($role, $auth->id);
            }

            Yii::$app->session->setFlash('success', 
                Yii::t('app', 'User: # ' . $person->full_name . ' was updated successfully'));

            return $this->redirect(['index']);
        }

        $this->model = $person;

        if (Yii::$app->request->isAjax)
            return $this->renderAjax('update', [
                'auth' => $auth,
                'person' => $person,
            ]);
        else
            return $this->render('update', [
                'auth' => $auth,
                'person' => $person,
            ]);
    }

    public function actionDelete($id)
    {
        $auth = Auth::findOne( $id );
        $person = Person::findOne( $auth->id );

        if ($auth) {
            $auth->status = Auth::STATUS_DELETED;
            $auth->save(false);
        }

        if ($person) {
            $person->status = Status_Party::No;
            $person->deleted_at = date('Y-m-d H:i:s');
            $person->save(false);
        }

        return $this->redirect(['index']);
    }

    public function actionDeleteMultiple()
    {
        // $result = $errors = null;
        $id_list = Json::decode(Yii::$app->request->post('id_list'));

        foreach ($id_list as $id)
        {
            $auth = Auth::findOne(['id' => $id]);
            $person = Person::findOne($auth->id);

            if ($auth) {
                $auth->status = Auth::STATUS_DELETED;
                $auth->save(false);
            }

            if ($person) {
                $person->status = Status_Party::No;
                $person->deleted_at = date('Y-m-d H:i:s');
                $person->save(false);
            }
        }
        // if (!empty($result))
        //     Yii::$app->session->setFlash( 'success', 
        //         Yii::t('app', '(' . $result . ') rows were deleted permanently') );

        // if (!empty($errors))
        //     Yii::$app->session->setFlash( 'error', 
        //         Yii::t('app', 'Some of the selected rows: (' . $errors . ') could not be deleted') );

        return $this->redirect(['index']);
    }

    public function actionChangePwd( $id )
    {
        $auth = Auth::findOne( $id );
 
        if (Yii::$app->request->isAjax && $auth->load(Yii::$app->request->post(), 'Auth'))
        {
            if (!empty( $auth->new_password ))
            {
                $auth->setPassword( $auth->new_password );
                $auth->auth_key = Yii::$app->security->generateRandomString();
                // Active must be a string so ignore validate step
                if ( $auth->save(false) )
                {
                    $user = Person::findOne( $id );
                    $user->save(false);

                    if (Yii::$app->user->id == $auth->id)
                        Yii::$app->user->logout();
                        // Yii::$app->cache->flush(); // Clear all cache here ?
                    else
                        return $this->asJson(['success' => true]);
                }
            }
        }

        $this->formViewType = Type_Form_View::Single;

        return $this->renderAjax('_change_pwd', ['model' => $auth]);
    }

    private function _sendWelcomeMail( $email, $username, $password )
    {
        $subject = Yii::t('app', 'New User Account - ' . Yii::$app->params['appShortName']);
        $salutation = Yii::t('app', 'Hello') . ' ' . Html::encode($username) . ',';
        $loginLink = Yii::$app->request->hostInfo;

        $message = [
            'salutation' => $salutation,
            'preamble' => "Your new account is created for you. Please see the login details below:",
            'username' => $username,
            'password' => $password,
            'loginLink' => $loginLink,
        ];

        try {
            $mailer = $this->getMailer();
            return $mailer->compose(
                            ['html' =>'WelcomeNotification'],
                            ['content' => $content = $message]
                        )
                        ->setFrom(Yii::$app->params['supportEmail'])
                        ->setTo($email)
                        ->setSubject($subject)
                        ->send();
        }
        catch (\Swift_TransportException $e)
        {
            Yii::$app->session->setFlash('error', Yii::t('app', Html::encode('Failed. Welcome mail was not sent.')));
        }
    }
}
