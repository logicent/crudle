<?php

namespace crudle\app\user\commands;

use crudle\app\auth\models\Auth;
use crudle\app\auth\models\Role;
use crudle\app\main\helpers\App;
use crudle\app\user\enums\Type_Permission;
use crudle\app\user\enums\Type_Role;
use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    private $_auth;
    private $_assignments = [];

    public function actionInit()
    {
        $this->_auth = Yii::$app->authManager;

        $roles = $this->_auth->getRoles();
        foreach ($roles as $role)
        {
            $userIds = $this->_auth->getUserIdsByRole($role->name);
            if (!empty($userIds))
                $this->_assignments[$role->name] = $userIds;
        }
        // Removes all authorization data, including roles, permissions, rules, and assignments.
        $this->_auth->removeAll();

        $this->loadDefaultRoles();
        $this->loadDefaultPermissions();
    }

    public function actionLoadDefaultRoles()
    {
        $this->_auth = Yii::$app->authManager;

        $this->loadDefaultRoles();
    }

    private function loadDefaultRoles()
    {
        try {
            // add "System Manager" role
            $systemManager = $this->_auth->createRole(Type_Role::SystemManager);
            $systemManager->description = 'System manager can perform all functions and also manage other users';
            $this->_auth->add($systemManager);
            // add business domain roles
            foreach ( Type_Role::domainRoles() as $roleName )
            {
                $domainRole = $this->_auth->createRole($roleName);
                $domainRole->description = '';
                $this->_auth->add($domainRole);
                $this->_auth->addChild($systemManager, $domainRole);
            }
            // set role as active
            $systemManager = Role::findOne(['name' => Type_Role::SystemManager]);
            $systemManager->inactive = 0;
            $systemManager->save(false);

            // add "Administrator" role
            $administrator = $this->_auth->createRole(Type_Role::Administrator);
            $administrator->description = 'Administrator is the (hidden) default role for the system maintainer';
            $this->_auth->add($administrator);
            $this->_auth->addChild($administrator, $systemManager);
            // set default user as Administrator
            $defaultUserId = Auth::findOne(['username' => Type_Role::Administrator])->id;
            $this->_auth->assign($administrator, $defaultUserId);
            // set role as active
            $administrator = Role::findOne(['name' => Type_Role::Administrator]);
            $administrator->inactive = 0;
            $administrator->save(false);
        }
        catch (\yii\db\IntegrityException $e) {
            echo $e->errorInfo[2]; // show the error Message
        }
    }

    public function actionLoadDefaultPermissions()
    {
        $this->_auth = Yii::$app->authManager;

        $this->loadDefaultPermissions();
    }

    private function loadDefaultPermissions()
    {
        try {
            $createPermissions = $listPermissions = $readPermissions = $updatePermissions = 
            $deletePermissions = $exportPermissions = $importPermissions = $printPermissions = 
            $sharePermissions = $emailPermissions = [];
            // $submitPermissions = $cancelPermissions = $amendPermissions = [];

            $models = App::getAllModels();
            foreach ( $models as $modelClass => $modelName )
            {
                foreach ( $modelClass::permissions() as $operation )
                {
                    // add "Resource Name" item permission
                    $permission = $this->_auth->createPermission($operation . ' ' . $modelName);
                    $permission->description = $operation . ' a ' . $modelName;
                    $this->_auth->add($permission);

                    // TODO: apply permission rules using other approach

                    switch ($operation)
                    {
                        case Type_Permission::Create:
                            $createPermissions[] = $permission;
                            break;
                        case Type_Permission::List:
                            $listPermissions[] = $permission;
                            break;
                        case Type_Permission::Read:
                            $readPermissions[] = $permission;
                            break;
                        case Type_Permission::Update:
                            $updatePermissions[] = $permission;
                            break;
                        case Type_Permission::Delete:
                            $deletePermissions[] = $permission;
                            break;
                        case Type_Permission::Print:
                            $printPermissions[] = $permission;
                            break;
                        case Type_Permission::Share:
                            $sharePermissions[] = $permission;
                            break;
                        case Type_Permission::Email:
                            $emailPermissions[] = $permission;
                            break;
                        case Type_Permission::Export:
                            $exportPermissions[] = $permission;
                            break;
                        case Type_Permission::Import:
                            $importPermissions[] = $permission;
                            break;
                        // case Type_Permission::Submit:
                        //     $submitPermissions[] = $permission;
                        //     break;
                        // case Type_Permission::Cancel:
                        //     $cancelPermissions[] = $permission;
                        //     break;
                        // case Type_Permission::Amend:
                        //     $amendPermissions[] = $permission;
                        //     break;
                        default:
                    }
                }
            }

            // add "System Manager" role
            $systemManager = $this->_auth->getRole(Type_Role::SystemManager);

            // assign permissions to a role
            foreach($listPermissions as $permission)
                $this->_auth->addChild($systemManager, $permission);

            foreach($readPermissions as $permission)
                $this->_auth->addChild($systemManager, $permission);

            foreach($createPermissions as $permission)
                $this->_auth->addChild($systemManager, $permission);

            foreach($updatePermissions as $permission)
                $this->_auth->addChild($systemManager, $permission);

            foreach($deletePermissions as $permission)
                $this->_auth->addChild($systemManager, $permission);

            foreach($exportPermissions as $permission)
                $this->_auth->addChild($systemManager, $permission);

            foreach($importPermissions as $permission)
                $this->_auth->addChild($systemManager, $permission);

            foreach($printPermissions as $permission)
                $this->_auth->addChild($systemManager, $permission);

            foreach($sharePermissions as $permission)
                $this->_auth->addChild($systemManager, $permission);

            foreach($emailPermissions as $permission)
                $this->_auth->addChild($systemManager, $permission);

            // foreach($submitPermissions as $permission)
            //     $this->_auth->addChild($systemManager, $permission);

            // foreach($cancelPermissions as $permission)
            //     $this->_auth->addChild($systemManager, $permission);

            // foreach($amendPermissions as $permission)
            //     $this->_auth->addChild($systemManager, $permission);
            // restore cached user assignments if cleared earlier
            foreach ( $this->_assignments as $roleName => $userIds )
            {
                $role = $this->_auth->getRole($roleName);
                foreach ( $userIds as $userId )
                    $this->_auth->assign($role, $userId);
            }
        }
        catch (\yii\db\IntegrityException $e) {
            echo $e->errorInfo[2]; // show the error Message
        }
    }
}
