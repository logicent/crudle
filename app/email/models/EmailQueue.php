<?php

namespace crudle\app\setup\models;

use crudle\app\setup\enums\Type_Permission;
use crudle\app\setup\enums\Status_Queue;
use crudle\app\setup\enums\Type_Role;
use crudle\app\setup\enums\Status_User;
use crudle\app\user\models\Person;
use crudle\app\crud\models\BaseActiveRecord;
use crudle\app\setup\models\Setup;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * This is the model class for table "email_queue".
 */
class EmailQueue extends BaseActiveRecord
{
    public function init()
    {
        parent::init();
        $this->listSettings->listNameAttribute = 'id';
    }

    public static function tableName()
    {
        return '{{%Email_Queue}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\BlameableBehavior::class,
                // 'attributes' => [
                //     ActiveRecord::EVENT_BEFORE_INSERT => ['created_by'],
                // ],
                'value' => function () {
                    if ( is_a( Yii::$app, 'yii\console\Application') )
                    {
                        $authMan = Yii::$app->authManager;
                        $userId = $authMan->getUserIdsByRole( Type_Role::SystemManager );
                        $value = $userId[0];
                    }
                    else
                        $value = Yii::$app->get('user')->id;
                    return $value;
                }
            ],
            [
                'class' => \yii\behaviors\TimestampBehavior::class,
                // 'attributes' => [
                //     ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                // ],
                'value' => function ($event) {
                    return new \yii\db\Expression('NOW()');
                },
            ]
        ];
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['from', 'to', 'subject', 'message'], 'required'],
            [['status'], 'default', 'value' => Status_Queue::NotSent],
            [['cc', 'message', 'attachments'], 'string'],
            [['sent_at'], 'safe'],
            [['from', 'to', 'subject'], 'string', 'max' => 140],
        ], $rules);
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'from' => Yii::t('app', 'From'),
            'to' => Yii::t('app', 'To'),
            'cc' => Yii::t('app', 'Cc'),
            'status' => Yii::t('app', 'Status'),
            'subject' => Yii::t('app', 'Subject'),
            'message' => Yii::t('app', 'Message'),
            'attachments' => Yii::t('app', 'Attachments'),
            'sent_at' => Yii::t('app', 'Sent At'),
        ];
    }

    public static function permissions()
    {
        return [
            Type_Permission::Read => Type_Permission::Read,
            Type_Permission::List => Type_Permission::List,
        ];
    }

    // ActiveRecord Interface
    public static function enums()
    {
        return [
            'status' => [
                'class' => Status_Queue::class,
                'attribute' => 'inactive'
            ],
        ];
    }

    public function sendNotificationIf( $sourceModel, $url = null )
    {
        // $prefix = StringHelper::basename($sourceModel::class); // PHP 8.0?
        // $prefix = Inflector::camel2words($prefix);
        $this->subject = Yii::t('app', 'Notification') . ' - ' . $sourceModel->status;
        $preamble = $sourceModel->description .'&nbsp;';

        // switch ($sourceModel->status) {
        // }

        $this->subject .= ' #' . $sourceModel->id;
        $status         = Yii::t('app', 'Status: ') . $sourceModel->status;
        $description    = $sourceModel->description;

        $notifyPerson = Person::find()->innerJoinWith('crdl_Auth')->where(['crdl_User.id' => $sourceModel->{$sourceModel->sendTo()}])->one();
        $this->message = Json::encode([
            'salutation' => $notifyPerson->full_name,
            'preamble'  => $preamble,
            'description' => $description,
            'status'    => $status,
            'web_link'  => $url,
        ]);

        is_a(Yii::$app, 'yii\console\Application') ? 
            $from = Yii::$app->params['supportEmail'] : 
            $from = [Yii::$app->user->identity->email => Yii::$app->user->identity->person->full_name];

        $this->from = is_array($from) ? Json::encode($from) : $from;
        $this->to = Json::encode([$notifyPerson->auth->email => $notifyPerson->full_name]);

        $copyRecipients = $this->getCopyRecipients( $sourceModel );
        $this->cc = Json::encode( $copyRecipients );

        return $this->save(false); // TODO: use uuid to avoid id validation and DB error
    }

    public function getCopyRecipients( $sourceModel )
    {
        $cc_recipients = [];
        // check if activity cc recipients are defined
        $cc_recipients = Person::find()->select('email')
                                    ->innerJoinWith('crdl_Auth')
                                    ->where([ 'crdl_Auth.status' => Status_User::Active ])
                                    ->andWhere([ 'in', 'crdl_User.id', $sourceModel->{$sourceModel->ccIds()} ])
                                    ->column();

        // check if organization cc recipients are defined
        $model_email_settings = Setup::getSettings(EmailNotificationSettingsForm::class);

        $org_recipients = explode(',', $model_email_settings->cc_recipients);
        if ( !empty($org_recipients) && (bool) $model_email_settings->cc_paused === false )
            if (empty( $model_email_settings->cc_if_statuses ))
                $cc_recipients = array_merge( $org_recipients, $cc_recipients );
            else // check if status is applicable
                if (in_array( $sourceModel->status, $model_email_settings->cc_if_statuses ))
                    $cc_recipients = array_merge( $org_recipients, $cc_recipients );
                // else nothing to do
        // else nothing to do
        return $cc_recipients;
    }
}
