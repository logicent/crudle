<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use app\enums\Type_Role;
use app\models\auth\Role;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Html;

class RolePermissionController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = Role::class;

        return parent::init();
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'read', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'read', 'create', 'update'],
                        'allow' => true,
                        'roles' => [Type_Role::SystemManager, Type_Role::Administrator],
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => [Type_Role::SystemManager, Type_Role::Administrator],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $roles_filter = '';
        if (!Yii::$app->user->can(Type_Role::SystemManager) && !Yii::$app->user->can(Type_Role::Administrator))
            $roles_filter = ['not in', 'name', [Type_Role::Administrator, Type_Role::SystemManager]];

        if (Yii::$app->user->can(Type_Role::SystemManager))
            $roles_filter = ['not in', 'name', [Type_Role::Administrator]];

        $dataProvider = new ActiveDataProvider([
            'query' => Role::find()->where(['type' => Role::TYPE_ROLE])
                                   ->andWhere($roles_filter),
            'pagination' => false,                                   
            'sort' => false,
            // 'sort' => [
            //     'defaultOrder' => [
            //         'name' => SORT_ASC,
            //         'updated_at' => SORT_DESC,
            //     ]
            // ],
        ]);

        return $this->renderAjax('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate( $id = null )
    {
        $model = new Role();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
            if ($model->validate()) 
            {
                $auth = Yii::$app->authManager;

                $newRole = $auth->createRole($model->name);
                $newRole->description = $model->description;
                $auth->add($newRole);

                $permissions = Yii::$app->request->post('Permission');

                foreach ($permissions as $permission => $value)
                {
                    $perm = $auth->getPermission($permission);
                    $auth->addChild($newRole, $perm);
                }
            }
            else {
                $result = [];
                foreach ($model->getErrors() as $attribute => $errors) {
                    $result[Html::getInputId($model, $attribute)] = $errors;
                }
                return $this->asJson(['validation' => $result]);
            }

        $model->loadDefaultValues();
        $model->type = Role::TYPE_ROLE;

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
            if ($model->validate()) 
            {
                $auth = Yii::$app->authManager;

                if (Yii::$app->request->post('Permission'))
                    $permissions = Yii::$app->request->post('Permission');
                else {
                    $permissions = [];
                }
                // get name from oldAttributes in case it has changed
                $role = $auth->getRole($model->oldAttributes['name']);
                if (
                    $model->oldAttributes['name'] != Type_Role::SystemManager && 
                    $model->oldAttributes['name'] != Type_Role::Administrator
                )
                    $role->name = $model->name;

                $role->description = $model->description;
                $auth->update($model->oldAttributes['name'], $role);

                $old_permissions = $auth->getPermissionsByRole($role->name);
    
                foreach ($old_permissions as $permission => $value)
                {
                    if (!in_array($permission, $permissions))
                    {
                        $perm = $auth->getPermission($permission);
                        $auth->removeChild($role, $perm);
                    }
                }
                foreach ($permissions as $permission => $value)
                {
                    if (!in_array($permission, $old_permissions))
                    {
                        $perm = $auth->getPermission($permission);
                        $auth->addChild($role, $perm);
                    }
                }
                return $this->asJson(['success' => true]);
            }
            else {
                $result = [];
                foreach ($model->getErrors() as $attribute => $errors) {
                    $result[Html::getInputId($model, $attribute)] = $errors;
                }
                return $this->asJson(['validation' => $result]);
            }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            $auth = Yii::$app->authManager;
            $role = $auth->getRole($id);

            if ( count($auth->getUserIdsByRole($role->name)) > 0)
                Yii::$app->session->setFlash('error', 
                    Yii::t('app', 'Failed: Role is assigned to 1 or more users'));
            else {
                $permissions = $auth->getPermissionsByRole($role->name);

                foreach ($permissions as $permission)
                {
                    $perm = $auth->getPermission($permission->name);
                    $auth->removeChild($role, $perm);
                }
                $auth->remove($role);

                Yii::$app->session->setFlash('success', 
                    Yii::t('app', 'Role was deleted successfully.'));
            }
        }
        $this->redirect(['/setup']);
    }
}
