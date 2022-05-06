<?php

namespace crudle\app\main\models\auth;

use crudle\app\enums\Status_Active;
use crudle\app\main\models\base\BaseActiveRecord;
use crudle\app\setup\enums\Type_Role;
use crudle\app\main\models\UploadForm;
// use crudle\app\main\models\UploadForm;
use crudle\app\setup\models\ListViewSettingsForm;
use Yii;
use yii\db\Query;
use yii\helpers\Json;

/**
 * This is the model class for table "user".
 *
 * @property Auth $auth
 */
class Person extends BaseActiveRecord
{
    public $full_name;
    public $old_role;
    public $teammateIds;

    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'full_name'; // override in view index

        $this->uploadForm = new UploadForm();
        // $this->fileAttribute = 'avatar';
    }

    public static function partyType()
    {
        return 'Person';
    }

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['id', 'user_role', 'firstname', 'surname'],
                'required'
            ],
            [['user_role', 'sex', 'official_status', 'status', 'title_of_courtesy'],
                'safe'
            ],
            [['user_group', 'firstname', 'surname', 'avatar'],
                'string', 'max' => 140
            ],
            [['id', 'mobile_no'],
                'string', 'max' => 20
            ],
            ['notes', 'string'],
            ['personal_email', 'email'],
            ['personal_email', 'unique'],
            ['personal_email', 'filter', 'filter' => 'trim'],
            [['firstname', 'surname'], 'filter', 'filter' => 'trim'],
            // [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Auth::class, 'targetAttribute' => ['id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            // OAuth Provider
	        // 2FA enabled,	Twofa Secret, Twofa Timestamp
	        // Timezone
            'id' => Yii::t('app', 'Auth ID'),
            'user_role' => Yii::t('app', 'User role'),
            'user_group' => Yii::t('app', 'User group'), // Group
            'firstname' => Yii::t('app', 'Firstname'),
            'surname' => Yii::t('app', 'Surname'),
            'sex' => Yii::t('app', 'Sex'),
            'personal_email' => Yii::t('app', 'Personal email'),
            'official_email' => Yii::t('app', 'Work email'),
            'mobile_no' => Yii::t('app', 'Mobile no'),
            'official_status' => Yii::t('app', 'Work status'),
            'status' => Yii::t('app', 'Status'),
            'avatar' => Yii::t('app', 'Avatar'),
            'notes' => Yii::t('app', 'Notes'),
            'title_of_courtesy' => Yii::t('app', 'Title of courtesy'),
        ];
    }

    public function getAuth()
    {
        return $this->hasOne(Auth::class, ['id' => 'id']);
    }

    public function getPartner()
    {
        return null;
    }

    public function getRoles()
    {
        $all_roles = Item::find()->select(['name'])->where(['type' => 1]);

        if (
            !Yii::$app->user->can(Type_Role::Administrator) &&
            !Yii::$app->user->can(Type_Role::SystemManager)
        )
            $all_roles->andWhere(['<>', 'name', Type_Role::Administrator]);

        return $all_roles->asArray()->all();

        // Use this when user-defined role are suppported

        return (new Query())
            ->select(['name', 'description'])
            ->from('auth_item')
            ->where(['and', 'type=1',
                ['not like', 'name', 'Administrator'] // hide Administrator role
            ])
            ->all();
    }

    public static function getAssignedRolesBy( $user_id )
    {
        return Assignment::find()->select(['item_name'])->where(['in', 'user_id', $user_id])->column();
    }

    public static function getRoleByUserId( $user_id )
    {
        return Assignment::find()->select(['item_name'])->where(['user_id' => $user_id])->scalar();
    }

    public static function getRolesByName()
    {
        return Item::find()->select(['name'])
                        ->where(['type' => 1])
                        ->andWhere(['<>', 'name', Type_Role::Administrator])
                        ->asArray()
                        ->all();
    }

    public static function getUserFullNameById( $id )
    {
        return self::findOne($id)->full_name;
    }

    public function getTeammateIds()
    {
        $teammateIds = [];
        
        if (!empty($this->reports_to))
        {
            $teammateIds = self::find()->where(['in', 'reports_to', $this->reports_to])->column();

            array_push($teammateIds, $this->reports_to);
        }

        return $teammateIds;
    }

    public static function mixedValueFields()
    {
        return [
            'user_role',
        ];
    }

    public function beforeSave($insert)
    {
        if (! parent::beforeSave($insert))
            return false;

        $this->user_role = is_array($this->user_role) ? Json::encode($this->user_role) : null;

        return true;
    }

    public function afterFind()
    {
        if (empty($this->user_role))
            $this->user_role = [];
        else
            $this->user_role = Json::decode($this->user_role);

        $this->full_name = $this->firstname .BaseActiveRecord::SpaceChar. $this->surname;

        return parent::afterFind();
    }

    // ActiveRecord Interface
    public static function selectableItemsConfig()
    {
        return [
            'displayLabel' => 'full_name',
            'valueAttribute' => 'CONCAT(`firstname`, " ", `surname`) AS full_name',
        ];
    }

    public static function enums()
    {
        return [
            'status' => Status_Active::class,
        ];
    }

    public function allowPrint()
    {
        return false;
    }

    // Workflow Interface
    public function hasWorkflow()
    {
        return true;
    }

    public function lockUpdate()
    {
        return false;
    }

    public function userCanEdit( $userId = null )
    {
        return Yii::$app->user->id == $userId;
    }
}
