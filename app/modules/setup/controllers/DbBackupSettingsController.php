<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use app\enums\Type_Model;
use app\enums\Type_Relation;
use app\helpers\DbDumper;
// use app\helpers\DbRestore;
use app\models\auth\Auth;
use app\models\auth\Assignment;
use app\models\auth\Item;
use app\models\auth\ItemChild;
use app\modules\setup\models\DbBackupSettingsForm;
use app\enums\Type_Role;
use app\models\auth\Person;
use app\models\auth\UserLog;
use app\modules\setup\models\Settings;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\FileHelper;

class DbBackupSettingsController extends BaseSettingsController
{
    public $backups;

    public function init()
    {
        $this->modelClass = DbBackupSettingsForm::class;
        $this->backups = FileHelper::findFiles(Yii::getAlias('@app/../storage/backups'));

        return parent::init();
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'db-dump', 'db-restore', 'clear-dump', 'delete-all'],
                'rules' => [
                    [
                        'actions' => ['index', 'db-dump', 'db-restore', 'clear-dump'],
                        'allow' => true,
                        'roles' => [Type_Role::SystemManager, Type_Role::Administrator],
                    ],
                    [
                        'actions' => ['delete-all'],
                        'allow' => true,
                        'roles' => [Type_Role::Administrator],
                    ],
                ],
            ],
        ];
    }

    public function actionDbDump()
    {
        $result = \app\helpers\DbDumper::createDbDump();

        if ($result === true) // dump succeeded
            return Yii::t('app', 'Database backup was created successfully');
        else // dump failed
            return $result; // Yii::t('app', 'Failed to create the database backup');
    }

    public function actionDbRestore()
    {
        // fetch uploaded or selected DB dump file
        // make a DB dump call before restore task
        // make a DB restore if applicable and return errors
        $result = '';
        if ($result === true) // restore succeeded
            return Yii::t('app', 'Database restore was completed successfully');
        else // restore failed
            return $result; // Yii::t('app', 'Failed to perform or complete the database restore');
    }

    public function actionClearDump()
    {
        $succeeded = true;
        foreach ($this->backups as $backup) {
            $succeeded = FileHelper::unlink( $backup ) && $succeeded;
        }
        if ($succeeded)
            return Yii::t('app', 'Database dumps cleared successfully');
        // else
        return Yii::t('app', 'Failed: Database dumps could not be cleared');
    }

    public function actionDeleteAll()
    {
        if ( Yii::$app->request->isAjax )
        {
            // Create a DB dump before performing delete all
            DbDumper::createDbDump();

            // Get a list of deletable resources
            $modelClasses = Type_Model::modelClasses();

            foreach ( $modelClasses as $modelClass )
            {
                $transaction = $modelClass::getDb()->beginTransaction();
                try {
                    foreach ( $modelClass::relations() as $relationId => $relationClass )
                    {
                        if ( is_array( $relationClass )) {
                            if ($relationClass['type'] == Type_Relation::InlineModel)
                                continue;
                            $relationClass['class']::deleteAll();
                        }
                        else
                            $relationClass::deleteAll();
                    }

                    $modelClass::deleteAll();

                    $transaction->commit();
                } 
                catch(\Throwable $e) {
                    $transaction->rollBack();
                    throw $e;
                }
            }

            $transaction = Auth::getDb()->beginTransaction();
            try {
                Assignment::deleteAll(['not in', 'item_name', [Type_Role::SystemManager, Type_Role::Administrator]]);
                // Rule::deleteAll();
                ItemChild::deleteAll(['not in', 'parent', [Type_Role::SystemManager, Type_Role::Administrator]]);
                Item::deleteAll(['not in', 'name', [Type_Role::SystemManager, Type_Role::Administrator]]);

                Person::deleteAll(['not in', 'user_role', [Type_Role::SystemManager, Type_Role::Administrator]]);
                $persons = Person::find()->asArray()->column();
                Auth::deleteAll(['not in', 'id', $persons]);

                UserLog::deleteAll();
                Settings::deleteAll();

                $transaction->commit();
            }
            catch(\Throwable $e) {
                $transaction->rollBack();
                throw $e;
            }
        }

        return $this->redirect(['/setup']);
    }
}
