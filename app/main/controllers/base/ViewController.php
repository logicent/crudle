<?php

namespace crudle\app\main\controllers\base;

use crudle\app\main\controllers\action\Download;
use crudle\app\main\controllers\action\ExportPdf;
use crudle\app\main\controllers\action\ExportText;
use crudle\app\main\controllers\action\ImageUpload;
use crudle\app\main\controllers\action\Index;
use crudle\app\main\controllers\action\MyLayoutSettings;
use crudle\app\main\controllers\action\RestoreDefaults;
use crudle\app\main\controllers\action\SwitchViewType;
use crudle\app\main\enums\Type_Form_View;
use crudle\app\main\enums\Type_Link;
use crudle\app\main\enums\Type_View;
use crudle\app\setup\forms\LayoutSettingsForm;
use crudle\app\setup\models\Setup;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\helpers\Url;

abstract class ViewController extends BaseController implements LayoutInterface, ViewInterface
{
    protected $name; // view name
    protected $detailModels = [];
    protected $validationErrors = [];
    protected $supportedViewTypes = [];

    public $layout = '@appMain/layouts/main';

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
        {
            Url::remember(Yii::$app->request->getUrl(), 'go back');
            $headers = Yii::$app->request->headers;
            if ($headers->has('HX-Request'))
                $this->redirect(['/app/login'], 302); // !! Experimental : Testing behavior
            else
                $this->redirect(['/app/login']);
            return false; // do not run the action
        }

        if (!parent::beforeAction($action)) {
             return false; // do not run the action
        }

        return true; // run the action
    }

    // public function afterAction($action, $result)
    // {
    //     $result = parent::afterAction($action, $result);
    //     // your custom code here
    //     // Yii::$app->response->statusCode = 204;
    //     return $result;
    // }

    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'index'                 => Index::class,
            'batch'                 => Batch::class,
            'my-layout-settings'    => MyLayoutSettings::class,
            'my-list-view-settings' => MyListViewSettings::class,
            'my-report-settings'    => MyReportSettings::class,
            'switch-view-type'      => SwitchViewType::class,
            'download'              => Download::class,
            'export-pdf'            => ExportPdf::class,
            'export-text'           => ExportText::class,
            'image-upload'          => ImageUpload::class,
            'print-to'              => PrintTo::class,
            'print-pdf'             => PrintPdf::class, // GeneratePdf
            'print-preview'         => PrintPreview::class, // PrintView
            'restore-defaults'      => RestoreDefaults::class,
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

    public function pageNavbar(): string
    {
        return $this->layout . '/_navbar';
    }

    public function showMainSidebar(): bool
    {
        return true;
    }

    public function sidebarMenus(): array
    {
        $layoutSettings = Setup::getSettings( LayoutSettingsForm::class );
        $menus = $layoutSettings->appSidebarMenu;
        return $menus ?? [];
    }

    public function sidebarColWidth(): string
    {
        return 'three';
    }

    public function mainColumnWidth(): string
    {
        return 'twelve';
    }

    public function fullColumnWidth(): string
    {
        return 'fourteen';
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

    public function mapActionToViewType()
    {
        switch ($this->action->id)
        {
            case 'view-list':
                return Type_View::List;
            case 'view-calendar':
                return Type_View::Calendar;
            case 'view-dashboard':
                return Type_View::Dashboard;
            case 'view-image':
                return Type_View::Image;
            case 'view-map':
                return Type_View::Map;
            case 'view-report':
                return Type_View::Report;
            case 'view-tree':
                return Type_View::Tree;
            case 'view-workspace':
                return Type_View::Workspace;
            case 'create':
            case 'read':
            case 'update':
                return Type_View::Form;
            default: // index or other
                return $this->defaultActionViewType();
        }
    }

    public function mainAction(): array
    {
        return [];
    }

    public function viewActions(): array
    {
        return [];
    }

    public function menuActions(): array
    {
        return [];
    }

    public function userActions(): array
    {
        return [];
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

    public function showViewHeader(): bool
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
                    $this->defaultActionViewType() == Type_View::List)
                    return true;
            case 'create':
            case 'read':
            case 'update':
                return true;
            default:
        }
    }

    public function showQuickReportMenu(): bool
    {
        return false;
    }

    public function quickReportMenu(): array
    {
        return [];
    }

    public function getModel($id = null)
    {
        return $this->model ??= $this->findModel($id);
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function redirectTo(string $action = null)
    {}

    public function validationErrors(): array
    {
        return [];
    }

    public function detailModelClass(): array
    {
        return [];
    }

    public function getDetailModels(): array
    {
        return !empty($this->detailModels) ? $this->detailModels : $this->model->links(Type_Link::Model, $includeEmpty = true);
    }
}
