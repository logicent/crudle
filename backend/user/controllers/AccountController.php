<?php

namespace crudle\app\user\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\app\main\enums\Status_Active;
use crudle\app\user\enums\Status_User;
use crudle\app\auth\models\Auth;
use crudle\app\listing\controllers\action\Index;
use crudle\app\user\enums\Type_Permission;
use crudle\app\user\models\Person;
use crudle\app\user\models\search\UserSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;

class AccountController extends CrudController
{
    public $auth;

    public function behaviors()
    {
        $modelName = 'User';

        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['create', 'read', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['read'],
                        'allow' => true,
                        'roles' => [ Type_Permission::Read .' '. $modelName ],
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => [ Type_Permission::Update .' '. $modelName ],
                        // 'roleParams' => function() {
                        //     return ['model' => Person::findOne(Yii::$app->request->get('id'))];
                        // },
                        // 'matchCallback' => function ($rule, $action)
                        // {
                        //     $this->model = Person::findOne(Yii::$app->request->get('id'));
                        //     return  Yii::$app->user->can('Update Own Person', ['model' => $this->model]);
                        // }
                    ],
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => [ Type_Permission::Create .' '. $modelName ],
                    ],
                    [
                        'actions' => ['delete', 'delete-many'],
                        'allow' => true,
                        'roles' => [ Type_Permission::Delete .' '. $modelName ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                    'delete-many' => ['POST'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'index' => Index::class,
        ];
    }

    public function modelClass(): string
    {
        return Person::class;
    }

    public function searchModelClass(): string
    {
        return UserSearch::class;
    }

    public function actionRead($id)
    {
        $this->auth = Auth::findOne(['id' => $id]);
        $person = Person::findOne($this->auth->id);

        $authMan = Yii::$app->authManager;
        $roles = $authMan->getRolesByUser($this->auth->id);

        // $person->user_role will be overwritten because role assignments are inherited
        foreach ($roles as $id => $role)
            $person->user_role = $role->name;

        $this->auth->getStatusLabel();

        $this->model = $person;

        if (Yii::$app->request->isAjax)
            return $this->renderAjax('@appModules/crud/views/crud/index', [
                // 'auth' => $this->auth,
                'model' => $person,
            ]);
        else
            return $this->render('@appModules/crud/views/crud/index', [
                // 'auth' => $this->auth,
                'model' => $person,
            ]);
    }

    public function actionCreate($id = null)
    {
        $this->auth = new Auth();
        $person = new Person();

        if ( Yii::$app->request->post() )
        {
            $this->auth->id = Yii::$app->security->generateRandomString(6);
            $person->id = $this->auth->id;

            if ($this->auth->load( Yii::$app->request->post(), 'Auth') &&
                $person->load( Yii::$app->request->post(), 'Person')
            ){
                try {
                    if (empty($this->auth->password))
                        $this->auth->password = Yii::$app->security->generateRandomString(10);

                    $this->auth->setPassword( $this->auth->password );
                    $this->auth->auth_key = Yii::$app->security->generateRandomString();
    
                    if ($this->auth->validate() && $person->validate())
                    {
                        if ($this->auth->save(false)) {
                            if ( !empty( $person->avatar ) )
                                $person->avatar = $this->uploadFile( $person );

                            if ($this->auth->status == Status_User::Active)
                                $person->status = Status_Active::Yes;

                            if ($this->auth->status == Status_User::Deleted)
                                $person->status = Status_Active::No;

                            if ($person->save(false)) {
                                $authMan = Yii::$app->authManager;
                                $roles = Json::decode($person->user_role);
                                foreach ($roles as $role_name) {
                                    $role = $authMan->getRole( $role_name );
                                    $authMan->assign( $role, $this->auth->id );
                                }
                                if ( (bool) $this->auth->send_welcome_email )
                                    $this->_sendWelcomeMail(
                                        $this->auth->email,
                                        $this->auth->username,
                                        $this->auth->password
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
                    \yii\helpers\ArrayHelper::merge( $this->auth->errors, $person->errors ));
            }
        }

        $this->model = $person;

        if (Yii::$app->request->isAjax)
            return $this->renderAjax('@appModules/crud/views/crud/index', [
                // 'auth' => $this->auth,
                'model' => $person,
            ]);
        else
            return $this->render('@appModules/crud/views/crud/index', [
                // 'auth' => $this->auth,
                'model' => $person,
            ]);
    }

    public function actionUpdate( $id )
    {
        $this->auth = Auth::findOne( $id );
        $person = Person::findOne( $this->auth->id );

        if ($this->auth->load(Yii::$app->request->post(), 'Auth') && $this->auth->validate())
            $this->auth->save(false);

        if ($person->load(Yii::$app->request->post(), 'Person') && $person->validate())
        {
            if ( !empty( $person->avatar ) )
                $person->avatar = $this->uploadFile( $person );

            if ($this->auth->status == Status_User::Active)
                $person->status = Status_Active::Yes;

            if ($this->auth->status == Status_User::Deleted)
                $person->status = Status_Active::No;

            $person->save(false);

            $authMan = Yii::$app->authManager;
            $roles = Json::decode($person->user_role);
            $authMan->revokeAll($this->auth->id);

            foreach ($roles as $role_name) {
                $role = $authMan->getRole($role_name);
                $authMan->assign($role, $this->auth->id);
            }

            Yii::$app->session->setFlash('success', 
                Yii::t('app', 'User: # ' . $person->full_name . ' was updated successfully'));

            return $this->redirect(['index']);
        }

        $this->model = $person;

        if (Yii::$app->request->isAjax)
            return $this->renderAjax('@appModules/crud/views/crud/index', [
                // 'auth' => $this->auth,
                'model' => $person,
            ]);
        else
            return $this->render('@appModules/crud/views/crud/index', [
                // 'auth' => $this->auth,
                'model' => $person,
            ]);
    }

    public function actionMyAccount($id)
    {
        return $this->render('my_account', []);
    }

    public function actionMyPreferences($id)
    {
        return $this->render('my_preferences', []);
    }

    public function actionDelete($id)
    {
        $this->auth = Auth::findOne( $id );
        $person = Person::findOne( $this->auth->id );

        // add a comment
        if ($this->auth) {
            $this->auth->status = Auth::STATUS_DELETED;
            $this->auth->save(false);
        }

        if ($person) {
            $person->status = Status_Active::No;
            // $person->update_at = date('Y-m-d H:i:s');
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
            $this->auth = Auth::findOne(['id' => $id]);
            $person = Person::findOne($this->auth->id);

            if ($this->auth) {
                $this->auth->status = Auth::STATUS_DELETED;
                $this->auth->save(false);
            }

            if ($person) {
                $person->status = Status_Active::No;
                // $person->updated_at = date('Y-m-d H:i:s');
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
        $this->auth = Auth::findOne( $id );

        if (Yii::$app->request->isAjax && $this->auth->load(Yii::$app->request->post(), 'Auth'))
        {
            if (!empty( $this->auth->new_password ))
            {
                $this->auth->setPassword( $this->auth->new_password );
                $this->auth->auth_key = Yii::$app->security->generateRandomString();
                // Active must be a string so ignore validate step
                if ( $this->auth->save(false) )
                {
                    $user = Person::findOne( $id );
                    $user->save(false);

                    if (Yii::$app->user->id == $this->auth->id)
                        Yii::$app->user->logout();
                        // Yii::$app->cache->flush(); // Clear all cache here ?
                    else
                        return $this->asJson(['success' => true]);
                }
            }
        }

        return $this->renderAjax('_change_pwd', ['model' => $this->auth]);
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
