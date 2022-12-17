<?php

namespace crudle\app\crud\models;

use crudle\app\main\helpers\App;
use crudle\app\crud\enums\Type_Comment;
use crudle\app\crud\enums\Type_Link;
use crudle\app\main\enums\Type_Mixed_Value;
use crudle\app\crud\enums\Type_Model_Id;
use crudle\app\crud\enums\Type_Relation;
use crudle\app\main\enums\Type_View;
use crudle\app\user\models\Person;
use crudle\app\user\enums\Permission_Group;
use crudle\app\user\enums\Type_Permission;
use crudle\app\setup\forms\LayoutSettingsForm;
use crudle\app\list_view\forms\ListViewSettingsForm;
use crudle\app\setup\models\Setup;
use crudle\app\workflow\components\WorkflowInterface;
use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Inflector;
use yii\helpers\Json;
use yii\helpers\StringHelper;

/**
 * This is the base model class for all other ActiveRecord models.
 */
abstract class BaseActiveRecord extends ActiveRecord implements ActiveRecordInterface, WorkflowInterface
{
    const SpaceChar = ' ';

    public $isCopyRecord = false;
    public $copyModel; // use to load source model
    public $copyDetailModels = [];  // use to load source detail models
    public $commentsCount;
    public $notifyEmail;
    public $uploadForm, $fileAttribute = null;
    public $listSettings;
    public $settings = null;
    public $detailValuesChanged;
    private $_changedValues;

    public function init()
    {
        parent::init();
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listIdAttribute = 'id';
    }

    public static function dbTableSchema()
    {
        return Yii::$app->db->getTableSchema(self::tableName());
    }

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::class,
                // 'attributes' => [
                //     ActiveRecord::EVENT_BEFORE_INSERT => ['created_by', 'updated_by'],
                //     ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_by',
                // ],
                'value' => function ($event) {
                    if (is_a( Yii::$app, 'yii\console\Application' ))
                        return $this->updated_by = $this->created_by; // NOT $this->id since it could be non-user record
                    else // (default)
                        return $this->updated_by = Yii::$app->user->id; // Yii::$app->get('user')->id;
                },
            ],
            [
                'class' => TimestampBehavior::class,
                // 'attributes' => [
                //     ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                //     ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                // ],
                'value' => function ($event) {
                    return new \yii\db\Expression('NOW()');
                },
            ]
        ];
    }

    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'trim'],
            [[
                'status',
                'title',
                'comments', // json
                'tags',
                'created_at', // YYYY-MM-DD HH:MM:SS
                'updated_at', // YYYY-MM-DD HH:MM:SS
            ], 'safe'],
            [['id', 'created_by', 'updated_by'], 'string', 'max' => 140],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'No.'),
            'status' => Yii::t('app', 'Status'),
            'title' => Yii::t('app', 'Title'),
            'comments' => Yii::t('app', 'Comments'),
            'tags' => Yii::t('app', 'Tags'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    public static function findExportTemplateData($columnNames)
    {
        $query = self::find()->select($columnNames);
        // check if join key exists and add columns here
        // if (isset($columnNames['join']))
        //     $query->joinWith($columnNames['join']['relTable'], true, 'INNER JOIN');
        // $query->join(
        //             'INNER JOIN', $columnNames['join']['relTable'],
        //                 "{$columnNames['join']['pkColumn']} = {$columnNames['join']['fkColumn']}"
        //         );

        // ... LEFT JOIN `post` ON `post`.`user_id` = `user`.`id`
        // $query->join('LEFT JOIN', 'post', 'post.user_id = user.id');

        // [$joinType, $tableName, $joinCondition]

        return $query->asArray()->all();
    }

    public static function loadDuplicateValues($fromModel, $toModel)
    {
        $filterAttributes = [
            'id',
            'status',
            'comments',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ];

        foreach ($fromModel->attributes as $attribute => $value) {
            if (in_array($attribute, $filterAttributes))
                continue;
            $toModel->{$attribute} = $value;
        }

        return $toModel;
    }

    public function valuesChanged()
    {
        $countChangedValues = 0;
        // compare old and new attribute values
        foreach ($this->oldAttributes as $name => $oldValue) {
            $newValue = $this->$name;
            if ($name == 'comments') // skip for now until json format support is done
            {
                $newValue = Json::encode($newValue);
                if ($newValue == $oldValue)
                    continue;
                if (empty($oldValue))
                    $oldValue = '<blank>'; // or _
                if (empty($newValue))
                    $newValue = '<blank>'; // or _
                $this->_changedValues .= $this->getAttributeLabel($name) . ' from <b>' . $oldValue . '</b> to <b>' . $newValue . '</b>, ';
                $countChangedValues += 1;
                continue;
            }
            if (is_object($newValue)) // avoid updated_at is yii\db\Expression object
                continue;
            if (in_array($name, $this::mixedValueFields()))
            {
                $oldValue = $this->getReformattedMixedValue($name, $oldValue);
                $newValue = $this->getReformattedMixedValue($name, $newValue);
                $unchanged = $this->compareMixedValues($name, $oldValue, $newValue);
                if ($unchanged)
                    continue;
            }
            if ($newValue == $oldValue)
                continue;
            // else
            $this->_changedValues .= $this->getAttributeLabel($name) . ' from ' . $oldValue . ' to ' . $newValue . ', ';
            $countChangedValues += 1;
        }

        return $countChangedValues > 0;
    }

    public function getChangedValues()
    {
        return $this->_changedValues;
    }

    public function getReformattedMixedValue($type, $value)
    {
        switch ($type)
        {
            case Type_Mixed_Value::CommaSeparated:
                if (!empty($value) && is_array($value))
                    return implode(',', $value);
                if (!empty($value) && !is_array($value))
                    return $value;
            default:
        }
    }

    public function compareMixedValues($type, $oldValue, $newValue)
    {
        switch ($type)
        {
            case Type_Mixed_Value::CommaSeparated:
                if (!empty($newValue) && is_array($newValue))
                    $newValue = implode(',', $newValue);
                return $newValue == $oldValue;
            default:
        }
    }

    public function getStatusAttribute()
    {
        if (is_array($this->enums()['status']))
            return $this->enums()['status']['attribute'];
        // else
        return 'status';
    }

    public function getLayoutSettings($attribute)
    {
        $settings = Setup::getSettings( LayoutSettingsForm::class );
        return $settings->$attribute;
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert))
            return false;

        // if (! $this->isNewRecord )
        //     if (! $this->valuesChanged()) // !! run as validation check instead
        //         return false;

        // comments is ALWAYS empty in model create operation
        if (empty($this->comments))
            $this->comments = null;
        else
            $this->comments = Json::encode($this->comments);

        return true;
    }

    public function afterSave($insert, $changedAttributes)
    {
        return parent::afterSave($insert, $changedAttributes);
    }

    public function afterFind()
    {
        $this->comments = Json::decode($this->comments);
        // TODO: use CommentForm::commentsCountByType($this->comments) or commentsCount()
        if (empty($this->comments))
            $this->commentsCount = 0;
        else {
            $userComments = [];
            foreach ($this->comments as $time => $comment) {
                if ($comment['type'] != Type_Comment::UserNote)
                    continue;
                $userComments[] = $comment;
            }
            if (!empty($userComments))
                $this->commentsCount = count($userComments);
            else
                $this->commentsCount = 0;
        }
        // TODO: check where this is used?
        // $this->commentId = $this->{self::primaryKey()[0]}; // Assuming non-composite PK

        return parent::afterFind();
    }

    // ActiveRecord Interface
    public static function selectableItemsConfig()
    {
        return [
            // 'itemsModelClass' => '',
            // 'keyAttribute' => 'id', // default - must exist in source tables
            // 'valueAttribute' => 'description', // default if not overridden
            // 'groupAttribute' => null,
            // 'displayLabel' => null,
            // 'filters' => [],
            // 'sortOrder' => null, // 'description ASC',
            // 'fetchAsArray' => true,
            // 'mapListResult' => true,
            // 'addEmptyFirstItem' => true, // only applicable if 'mapListResult' == true
            // 'addSelectedFieldValue' => true, // only if model->isNewRecord == false
            // 'applyListModelFilters' => true,
            // 'addAdvancedSearchLink' => false, // loads advanced search modal form
            // 'addCreateListItemLink' => false, // loads quick form modal if exists
            // 'refreshListItemsAfterCreate' => true,
            // 'selectAddedItemAfterRefresh' => true,
        ];
    }

    public static function enums()
    {
    }

    public static function relations()
    {
        return [];
    }

    public static function hasRelations()
    {
        return count(self::relations()) > 0;
    }

    public function links($type = Type_Link::Model, $includeEmpty = false)
    {
        $relations = [];
        foreach ($this::relations() as $relationId => $relationDetail) {
            if (!is_array($relationDetail))
                continue;
            if ($relationDetail['type'] == Type_Relation::ParentModel ||
                $relationDetail['type'] == Type_Relation::InlineModel)
                continue;

            switch ($type) {
                case Type_Link::Query:
                    $link = 'get' . Inflector::camelize($relationId);
                    $models = $this->$link();
                    break;
                default: // Type_Link::Model:
                    $link = $relationId;
                    $models = $this->$link;
            }
            // $formName = StringHelper::basename($relationDetail['class']);
            if (!empty($models) || (empty($models) && $includeEmpty))
                $relations[$relationId] = $models;
        }

        return $relations;
    }

    public function linksCount()
    {
        $count = 0;
        foreach ($this::relations() as $relationId => $relationClass) {
            $relation = 'get' . Inflector::camelize($relationId);
            $count += $this->$relation()->count();
        }

        return $count;
    }

    public function hasLinks()
    {
        return $this->linksCount() > 0;
    }

    public static function permissions()
    {
        return Type_Permission::enums();
    }

    public static function authRules()
    {
    }

    public static function auditTableColumns()
    {
    }

    public static function customFields()
    {
    }

    public function hasMixedValueFields()
    {
    }

    public static function mixedValueFields()
    {
        return [
            'comments',
        ];
    }

    public function autoSuggestId()
    {
        $query = $this::find();
        if (!empty($this::autoSuggestFilters()))
            foreach ($this::autoSuggestFilters() as $filterAttribute)
                $query->andWhere([$filterAttribute => $this->{$filterAttribute}]);

        switch ($this::autoSuggestIdType()) {
            case Type_Model_Id::UniqueIncrementedCount:
                $count = $query->count();
                return $count += 1;

            case Type_Model_Id::UniqueIncrementedValue:
                // TODO: sorting does not work since column data type is varchar
                $model = $query->orderBy($this->autoSuggestAttribute() . ' DESC')->one();
                return $model->{$this->autoSuggestAttribute()} + 1;

            case Type_Model_Id::GeneratedUuid:
                $uuid = \thamtech\uuid\helpers\UuidHelper::uuid();
                return $uuid;

            default:
                return null; // ?
        }
    }

    public static function autoSuggestIdValue()
    {
        return true;
    }

    public static function autoSuggestIdType()
    {
        return Type_Model_Id::UniqueIncrementedCount;
    }

    public static function autoSuggestFilters()
    {
        return [];
    }

    public static function autoSuggestAttribute()
    {
        return 'id';
    }

    public static function foreignKeyAttribute()
    {
    }

    public static function allowListView()
    {
        return true;
    }

    public static function viewType()
    {
        return [
            Type_View::List,
            Type_View::Form,
        ];
    }

    public static function moduleType()
    {}

    // Workflow Interface
    public function workflows()
    {
    }

    public function hasWorkflow()
    {
        return false;
    }

    public function allowDataImport()
    {
    }

    public function excludeAttributesInImport()
    {
    }

    public function allowDataExport()
    {
        return false;
    }

    public function excludeAttributesInExport()
    {
    }

    public function allowFileUpload()
    {
        return false;
    }

    public function limitFileUploads()
    {
    }

    // public $attachedFiles = [];
    // public $sharedWith = [];
    // public $tagsList = [];

    public function allowFileDownload()
    {
        return false;
    }

    public function allowPrint()
    {
        return false;
    }

    public function limitPrint()
    {  
    }

    public function allowSendEmail()
    {
        return false;
    }

    public function sendNotificationIf($status)
    {
    }

    public function personCanBeNotified($personId)
    {
    }

    public function allowDuplicate()
    {
        return true;
    }

    public function duplicateFrom( $model, $includeDetailModels = true )
    {

    }

    public function duplicateDetailModels()
    {
    }

    public function excludeAttributesInDuplicate()
    {
        return [
            'id',
            'status',
            'comments',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ];
    }

    public function allowComment()
    {
        return true;
    }

    public function lockUpdate()
    {
        return false;
    }

    public function userCan($permission, $userId = null)
    {
        $permissionName = $permission . self::SpaceChar . App::classDisplayName($this);
        $params = null;
        if (! $userId ) // assumes current user
            return Yii::$app->user->can($permissionName);

        return $this->checkAccessByUser($userId, $permissionName, $params);
    }

    public function requireSubmit()
    {}

    public function requireApproval()
    {}

    public function lockCancel()
    {}

    public function lockAmend()
    {}

    public function statusEnums( $key )
    {
        if (is_array($this->enums()['status']))
            $statusClass = $this->enums()['status']['class'];
        else
            $statusClass = $this->enums()[$key];

        return $statusClass::enums();
    }

    public function statusEnumsColors( $key )
    {
        if (is_array($this->enums()['status']))
            $statusClass = $this->enums()['status']['class'];
        else
            $statusClass = $this->enums()[$key];

        return $statusClass::enumsColor();
    }

    public function nextStatus()
    {
    }

    public function requireCommentIf($status)
    {
    }

    public function lockDelete()
    {
        return false;
    }

    public function useSoftDelete()
    {
    }

    public function allowedReportSourceStatusOnCreate()
    {
    }

    public function checkAccessByUser($userId, $permissionName, $params = null)
    {
        $user = Person::findOne($userId);
        if (!$user)
            return false;

        return Yii::$app->authManager->checkAccess($userId, $permissionName, $params);
    }
}
