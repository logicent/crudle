<?php

namespace app\modules\main\controllers\base;

use app\modules\main\models\CommentForm;
use app\modules\main\enums\Type_Comment;
use app\modules\main\enums\Type_View;
use app\helpers\PdfCreator;
use app\helpers\PdfHelper;
use app\helpers\SendNotification;
use app\modules\setup\models\Setup;
use app\modules\setup\models\SmtpSettingsForm;
use Yii;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;

abstract class BaseController extends Controller
{
    public $modelClass;
    public $model;
    public $loadModal = false;
    public $viewType;
    public $formViewType;
    // public $formView;
    public $showViewTypeSwitcher = true;
    public $showViewFilterButton = true;
    // Layout partials (Default)
    // public $navbar      = '/_layouts/_main_navbar';
    // public $header      = '/_layouts/_view_header';
    // public $sidebar     = '/_layouts/_sidebar_nav';
    public $sharedViewPath = false;
    public $sidebar     = true;
    public $sidebarWidth = 'three';
    public $mainWidth = 'thirteen';
    public $fullWidth = 'sixteen';
    // public $contextMenu = '/_layouts/_menu/_context_menu';
    // public $showContextMenu = false;
    public $statusMenu = '/_form/_status_menu';
    // public $flashMessage    = '/_layouts/_flash_message';
    // public $viewHeaderMenu  = '/_layouts/_view_header_menu';
    // View Reports quick menu
    // public $viewReportMenu = [];
    // public $linkedData = '_linked_data';
    // Layout partial (Form Sidebar)
    // public $_viewSidebar = null;
    public $commentCount = 0;
    public $resourceName;

    public function init()
    {
        parent::init();

        // Yii::$app->language = Yii::$app->request->cookies->getValue('language', 'en');

        $this->viewPath = dirname($this->viewPath) .'/'. Inflector::underscore(
            Inflector::id2camel(StringHelper::basename($this->id))
        );

        $this->resourceName = Inflector::camel2words(
            Inflector::id2camel(StringHelper::basename($this->id), '/')
        );
    }

    public function actionSwitchViewType(string $name)
    {
        return $this->render('@app_main/views/_' . $name . '/index');
    }

    public function actionDownload($res)
    {
        $file = base64_decode($res);

        header('Content-type:application/pdf');
        header('Content-Disposition:attachment;filename="download.pdf"');
        readfile($file);

        // $response = Yii::$app->response->setDownloadHeaders('download', 'application/pdf');
        // if (file_exists($file))
        //     return $response->xSendFile($file);
    }

    public function actionPrintPdf()
    {
        $pdf = new PdfCreator();

        $modelClass = Yii::$app->request->get('modelClass');
        $id = Yii::$app->request->get('id');
        $this->model = $modelClass::findOne($id);
        $this->detailModels = $this->model->links();

        // $this->layout = 'print'; // ?

        $html = $this->render('readonly', [
            'model' => $this->model,
            'modelDetails' => $this->detailModels
        ]);

        $fileName = Inflector::camelize($this->resourceName) . '_' . $this->model->id  . '.pdf';
        $file = $pdf->saveToFile($html, $fileName);

        header("Content-type:application/pdf");
        header("Content-Disposition:attachment;filename={$fileName}");
        readfile($file);
    }

    public function actionPrintPreview()
    {
        $id = Yii::$app->request->get('id');
        $this->model = $this->findModel($id);
        $this->detailModels = $this->model->links();

        $this->layout = 'print';

        if (Yii::$app->request->get('viewType') == Type_View::List)
            return $this->actionIndex();
        // else
        return $this->render('readonly', [
            'model' => $this->model,
            'modelDetails' => $this->detailModels
        ]);
    }

    public function actionExportPdf()
    {
        $id = Yii::$app->request->get('id');
        $this->model = $this->findModel($id);
        $this->detailModels = $this->model->links();

        $this->layout = 'print';

        if (Yii::$app->request->get('viewType') == Type_View::List)
            $html = $this->actionIndex();
        else
            $html = $this->render('readonly', [
                'model' => $this->model,
                'modelDetails' => $this->detailModels
            ]);

        if (in_array('status', $this->modelClass::attributes()))
            $statusLabel = '_' . $this->model->status;
        else
            $statusLabel = null;
        $fileName = Inflector::camelize($this->resourceName) . '_' . $this->model->id  . $statusLabel . '.pdf';

        $pdf = new PdfHelper();
        $file = $pdf->writeFromHtml($html, $fileName, [
            'skip-cdn' => true,
            'css' => Yii::getAlias('@vendor/bower/semantic-ui/dist/semantic.css'),
            'js' => Yii::getAlias('@vendor/bower/semantic-ui/dist/semantic.min.js'),
        ]);

        header("Content-type:application/pdf");
        header("Content-Disposition:attachment;filename={$fileName}");
        readfile($file);
    }

    public function actionExportText()
    {
        $id = Yii::$app->request->get('id');
        $this->model = $this->findModel($id);
        $this->detailModels = $this->model->links();

        $this->layout = 'print';

        if (Yii::$app->request->get('viewType') == Type_View::List)
            $html = $this->actionIndex();
        else
            $html = $this->render('readonly', [
                'model' => $this->model,
                'modelDetails' => $this->detailModels
            ]);

        if (in_array('status', $this->modelClass::attributes()))
            $statusLabel = '_' . $this->model->status;
        else
            $statusLabel = null;
        $fileName = Inflector::camelize($this->resourceName) . '_' . $this->model->id  . $statusLabel . '.html';

        header("Content-type:plain/text");
        header("Content-Disposition:attachment;filename={$fileName}");
        readfile($html);
    }

    public function actionPrint()
    {
        $this->sidebar = false;

        return $this->render('/main/blank', [
            'message' => 'To be implemented',
        ]);
    }

    public function actionReportBuilder()
    {
        $this->layout = 'report';

        $model = new $this->modelClass();

        $columns = array_diff_key($model->attributeLabels(), $model->skip_in_report);

        return $this->renderAjax('/report-builder/index', [
            'title' =>  Inflector::titleize($this->id),
            // 'module' => Inflector::titleize(Inflector::pluralize($this->id)),
            'showFilters' => true,
            'pickColumns' => [], // Add column and drag to change position
            'sortBy' => [],
            'showTotals' => false,
            'columns' => $columns, // headers
            'rows' => $model->getReportData($columns),
            'totals' => []
        ]);
    }

    public function actionShowRelatedText()
    {
        if (Yii::$app->request->isAjax) {
            $modelClass = Yii::$app->request->get('model_class');
            $model = $modelClass::findOne(Yii::$app->request->get('field_id'));
            $attribute = Yii::$app->request->get('text_col');
            return $model->$attribute;
        }
        // else
        Yii::$app->end();
    }

    public function actionShowCommentModal()
    {
        if (Yii::$app->request->isAjax); {
            return $this->renderAjax('@app_main/views/_form/_comment_modal', [
                'url'   => Yii::$app->request->get('url'),
                'new_status' => Yii::$app->request->get('new_status'),
                'require_comment' => Yii::$app->request->get('require_comment')
            ]);
        }
        // else
        Yii::$app->end();
    }

    public function actionSaveComment($model_id)
    {
        if (Yii::$app->request->isAjax); {
            $model = $this->modelClass::findOne($model_id);

            $comment = new CommentForm;
            $comment->comment = Yii::$app->request->post('comment_text');
            $comment->save($model, false, Type_Comment::UserNote);

            $model->refresh(); // !! MUST do this to get an array in comments
            return $this->renderPartial('@app_main/views/_layouts/_comments', ['comments' => $model->comments]);
        }
        // else
        Yii::$app->end();
    }

    public function actionResendNotification($id)
    {
        SendNotification::processQueueEntry($id);
    }

    public function actionResendNotifications()
    {
        SendNotification::processQueue();
    }

    protected function uploadFile(&$model)
    {
        $fileObj = UploadedFile::getInstance($model->uploadForm, 'file_upload');

        if ($fileObj)
        {
            $model->uploadForm->file_upload = $fileObj;
            // if saveAs succeeded file_path is returned else false
            return $model->uploadForm->upload();
        }

    //     $model->uploadForm->file_upload = UploadedFile::getInstance(
    //         $model->uploadForm,
    //         "file_upload"
    //     );
    //     if (!is_null($model->uploadForm->file_upload))
    //         return $model->uploadForm->upload(); // filePath

    //     return false;
    }

    protected function uploadFiles(&$model)
    {
        $fileObjects = UploadedFile::getInstances($model->uploadForm, 'file_uploads');
        if ($fileObjects)
        {
            $model->uploadForm->file_uploads = $fileObjects;
            // if saveAs succeeded file_path is returned else false
            return $model->uploadForm->uploads();
        }
        // $model->uploadForm->file_uploads = UploadedFile::getInstances(
        //     $model->uploadForm,
        //     "file_uploads"
        // );
        // if (!is_null($model->uploadForm->file_uploads))
        //     return $model->uploadForm->uploads(); // filePaths

        // return false;
    }

    public function sendMail($msg, $from_support = false, $addAttachments = null)
    {
        $mailer = $this->getMailer();
        // if (is_null($mailer))
        //     $mailer = Yii::$app->mailer->compose();

        $message = $mailer->compose()
            ->setFrom($msg->from)
            ->setTo($msg->to)
            ->setSubject($msg->subject)
            ->setHtmlBody($msg->message);

        if (!empty($msg->attachments)) // attach file from local file system
            $mailer->attach($msg->attachments[0]); // loop through them if more than 1.

        if (!empty($addAttachments)) // create attachment on-the-fly
            $mailer->attachContent($addAttachments->content, ['fileName' => $addAttachments->filename, 'contentType' => 'application/pdf']);

        try {
            $mailer->send($message);
        } catch (\Swift_SwiftException $e) {
            // display error encountered
            echo $e->errorInfo[2];
        }
    }

    public function getMailer()
    {
        $model = Setup::getSettings(SmtpSettingsForm::class);

        $config = [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/views/_mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => $model->smtp_host,
                'username' => $model->smtp_username,
                'password' => $model->smtp_password,
                'port' => $model->smtp_port,
                'encryption' => $model->smtp_encryption,
            ],
        ];

        return Yii::createObject($config);
    }

    public function refresh($anchor = '')
    {
        // stop executing this action and refresh the current page
        return $this->refresh();
    }

    // public function actionImageUpload()
    // {
    //     // autorotate() Rotates an image automatically based on EXIF information.
    //     // crop()       Crops an image.
    //     // resize() 	Resizes an image.
    //     // text() 	    Draws a text string on an existing image.
    //     // watermark() 	Adds a watermark to an existing image.

    //     if (Yii::$app->request->isAjax)
    //     {
    //         // frame()  Adds a frame around of the image. Please note that the image size will increase by $margin x 2.
    //         Image::frame(Yii::$app->request->post('img_path'), 5, '666', 0)
    //                     ->rotate(-8)
    //                     ->save('@webroot/images/' . Yii::$app->request->post('img_path'), ['jpeg_quality' => 50]);

    //         // thumbnail() 	Creates a thumbnail image.
    //         Image::thumbnail('@webroot/images/' . Yii::$app->request->post('img_path'), 120, 120)
    //                     ->save(Yii::getAlias('@webroot') . '_thumb', ['quality' => 50]);
    //     }

    // }

    // public function afterAction($action, $result)
    // {
    //     $result = parent::afterAction($action, $result);
    //     // your custom code here
    //     // Yii::$app->response->statusCode = 200;
    //     // get URLs for back button - not working perhaps use a cache of links
    //         // Do this for all actionIndex
    //     return $result;
    // }

    // public function actionIndex()
    // {
    //     Url::remember(Yii::$app->request->getUrl(), Yii::$app->controller->id);
    // }

    // public function actionStoreUserPreferences()
    // {
    //     if(Yii::$app->request->isAjax)
    //     {
    //     }
    // }

    // public function actionRestoreDefaults()
    // {
    //     if(Yii::$app->request->isAjax)
    //     {
    //     }
    // }
}
