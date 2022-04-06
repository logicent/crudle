<?php

namespace app\modules\setup\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use app\modules\setup\enums\Type_Role;
use app\modules\setup\models\Role;
use app\modules\setup\models\RoleSearch;
use Yii;
use yii\helpers\Html;

class RoleController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = Role::class;
        $this->modelSearchClass = RoleSearch::class;

        return parent::init();
    }

    public function actionCreate( $id = null )
    {
        $this->model = new Role();

        if (Yii::$app->request->isAjax && $this->model->load(Yii::$app->request->post()))
            if ($this->model->validate()) 
            {
                $auth = Yii::$app->authManager;

                $newRole = $auth->createRole($this->model->name);
                $newRole->description = $this->model->description;
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
                foreach ($this->model->getErrors() as $attribute => $errors) {
                    $result[Html::getInputId($this->model, $attribute)] = $errors;
                }
                return $this->asJson(['validation' => $result]);
            }

        $this->model->loadDefaultValues();
        $this->model->type = Role::TYPE_ROLE;

        return $this->render('@app_main/views/_crud/index', [
            'model' => $this->model,
        ]);
    }

    public function actionUpdate($id)
    {
        $this->model = $this->findModel($id);

        if (Yii::$app->request->isAjax && $this->model->load(Yii::$app->request->post()))
            if ($this->model->validate()) 
            {
                $auth = Yii::$app->authManager;

                if (Yii::$app->request->post('Permission'))
                    $permissions = Yii::$app->request->post('Permission');
                else {
                    $permissions = [];
                }
                // get name from oldAttributes in case it has changed
                $role = $auth->getRole($this->model->oldAttributes['name']);
                if (
                    $this->model->oldAttributes['name'] != Type_Role::SystemManager && 
                    $this->model->oldAttributes['name'] != Type_Role::Administrator
                )
                    $role->name = $this->model->name;

                $role->description = $this->model->description;
                $auth->update($this->model->oldAttributes['name'], $role);

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
                foreach ($this->model->getErrors() as $attribute => $errors) {
                    $result[Html::getInputId($this->model, $attribute)] = $errors;
                }
                return $this->asJson(['validation' => $result]);
            }

        return $this->render('@app_main/views/_crud/index', [
            'model' => $this->model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->model = $this->findModel($id);

        if (Yii::$app->request->isAjax && $this->model->load(Yii::$app->request->post()))
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
        $this->redirect(['/']);
    }
}
