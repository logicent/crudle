<?php

namespace crudle\app\main\controllers\base;

use crudle\app\main\controllers\action\BatchAction;
use crudle\app\main\controllers\action\DownloadAction;
use crudle\app\main\controllers\action\ExportPdfAction;
use crudle\app\main\controllers\action\ExportTextAction;
use crudle\app\main\controllers\action\ImageUploadAction;
use crudle\app\main\controllers\action\IndexAction;
use crudle\app\main\controllers\action\MyLayoutSettingsAction;
use crudle\app\main\controllers\action\MyListViewSettingsAction;
use crudle\app\main\controllers\action\MyReportSettingsAction;
use crudle\app\main\controllers\action\PrintAction;
use crudle\app\main\controllers\action\PrintPdfAction;
use crudle\app\main\controllers\action\PrintPreviewAction;
use crudle\app\main\controllers\action\RestoreDefaultsAction;
use crudle\app\main\controllers\action\SwitchViewTypeAction;
use crudle\app\main\enums\Type_Form_View;
use crudle\app\main\enums\Type_View;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\helpers\Url;

abstract class BaseViewController extends BaseController implements LayoutInterface, ViewInterface
{
    protected $name; // view name
    protected $detailModels = [];
    protected $validationErrors = [];
    protected $supportedViewTypes = [];

    public $layout = '@app_main/views/_layouts/main';

    public function init()
    {
        parent::init();

        Yii::$app->language = Yii::$app->request->cookies->getValue('language', 'en');

        $this->viewPath = dirname($this->viewPath) .'/'. Inflector::underscore(
            Inflector::id2camel(StringHelper::basename($this->id))
        );

        $this->name = Inflector::camel2words(
            Inflector::id2camel(StringHelper::basename($this->id), '/')
        );
    }

    public function beforeAction($action)
    {
        // If there is no logged in user session
        if (is_null(Yii::$app->user->identity) &&
            $this->action->id !== 'login' &&
            $this->action->id !== 'request-password-reset' &&
            $this->action->id !== 'reset-password'
        )
            $this->redirect(['/app/login']);

        Url::remember(Yii::$app->request->getUrl(), 'go back');

        return parent::beforeAction($action);
    }

    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'index'         => IndexAction::class,
            'batch-action'      => BatchAction::class,
            'my-layout-settings'    => MyLayoutSettingsAction::class,
            'my-list-view-settings' => MyListViewSettingsAction::class,
            'my-report-settings'    => MyReportSettingsAction::class,
            'switch-view-type'      => SwitchViewTypeAction::class,
            'download'              => DownloadAction::class,
            'export-pdf'            => ExportPdfAction::class,
            'export-text'           => ExportTextAction::class,
            'image-upload'          => ImageUploadAction::class,
            'print'                 => PrintAction::class, // PrintTo device
            'print-pdf'             => PrintPdfAction::class, // GeneratePdf
            'print-preview'         => PrintPreviewAction::class, // PrintView
            'restore-defaults'          => RestoreDefaultsAction::class,
        ]);
    }

    // LayoutInterface
    public function allowThemeChange(): bool
    {
        return false;
    }

    public function currentTheme(): string
    {
        return 'default';
    }

    public function supportedThemes(): array
    {
        return [];
    }

    public function allowThemeCustomization(): bool
    {
        return false;
    }

    public function defaultViewType()
    {
        switch ($this->action->id)
        {
            case 'index':
                return Type_View::List;
            case 'create':
            case 'update':
                return Type_View::Form;
            default:
        }
    }

    public function showViewTypeSwitcher(): bool
    {
        return false;
    }

    public function showViewFilterButton(): bool
    {
        return true;
    }

    public function getViewFilterButtonState()
    {
    }

    public function setViewFilterButtonState()
    {
    }

    public function pageNavbar(): string
    {
        return $this->layout . '/_navbar';
    }

    public function showViewHeader(): bool
    {
        return true;
    }

    public function showMainSidebar(): bool
    {
        return true;
    }

    public function showViewSidebar(): bool
    {
        return true;

        switch ($this->action->id)
        {
            case 'index':
                if ($this->formViewType() == Type_Form_View::Single ||
                    $this->defaultViewType() == Type_View::List)
                    return true;
            case 'create':
            case 'read':
            case 'update':
                return true;
            default:
        }
    }

    public function sidebarColWidth(): string
    {
        return 'three';
    }

    public function mainColumnWidth(): string
    {
        return 'thirteen';
    }

    public function fullColumnWidth(): string
    {
        return 'sixteen';
    }

    public function showQuickReportMenu(): bool
    {
        return false;
    }

    public function quickReportMenu(): array
    {
        return [];
    }

    public function showActiveUsers(): bool
    {
        return false;
    }

    // ViewInterface
    public function viewName(): string
    {
        return $this->name;
    }

    public function showTabbedViews(): bool
    {
        return false;
    }

    public function searchModelClass(): string
    {
        return '';
    }

    public function searchModel()
    {}

    public function modelClass(): string
    {
        return '';
    }

    public function getModel($id = null)
    {
        return $this->model ??= $this->findModel($id);
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function detailModelClass(): array
    {
        return [];
    }

    public function redirectTo(string $action = null)
    {}

    public function getDetailModels(): array
    {
        return $this->detailModels ??= $this->model->links();
    }

    public function validationErrors(): array
    {
        return [];
    }
}
