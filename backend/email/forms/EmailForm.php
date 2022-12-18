<?php

namespace crudle\app\email\forms;

use crudle\app\main\models\Model;
use crudle\app\main\forms\UploadForm;
use Yii;

class EmailForm extends Model
{
    public $to;
    public $cc;
    public $bcc;
    public $emailTemplate;
    public $subject;
    public $message;
    public $sendMeACopy = false;
    public $sendReadReceipt = false;
    public $attachDocumentPrint = false;
    public $printFormat;
    public $addAttachments;
    // public $language;

    public function init()
    {
        $this->uploadForm = new UploadForm();
        $this->fileAttribute = 'addAttachments';
    }

    public function rules()
    {
        return [
            [[
                'to',
                'cc',
                'bcc',
                'emailTemplate',
                'subject',
                'message',
                'sendMeACopy',
                'sendReadReceipt',
                'attachDocumentPrint',
                'printFormat',
                'addAttachments',
                // 'language',
            ], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'to' => Yii::t('app', 'To'),
            'cc' => Yii::t('app', 'Cc'),
            'bcc' => Yii::t('app', 'Bcc'),
            'emailTemplate' => Yii::t('app', 'Email template'),
            'subject' => Yii::t('app', 'Subject'),
            'message' => Yii::t('app', 'Message'),
            'sendMeACopy' => Yii::t('app', 'Send me a copy'),
            'sendReadReceipt' => Yii::t('app', 'Send read receipt'),
            'attachDocumentPrint' => Yii::t('app', 'Attach document print'),
            'printFormat' => Yii::t('app', 'Print format'),
            'addAttachments' => Yii::t('app', 'Add attachments'),
            // 'language' => Yii::t('app', 'Language'),
        ];
    }
}