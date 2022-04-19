<?php

namespace crudle\main\controllers\base;

use crudle\main\enums\Resource_Action;
use crudle\main\enums\Type_View;
use Yii;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\helpers\Url;

abstract class BaseViewController extends BaseController implements LayoutInterface, ViewInterface
{
    protected $name; // view name
    protected $detailModels = [];
    protected $validationErrors = [];

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

    public function actionMyLayoutSettings()
    {}

    public function actionSwitchViewType(string $name)
    {
        return $this->render('@app_main/views/_' . $name . '/index');
    }

    public function currentViewType()
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

    public function formViewType()
    {}

    public function showViewTypeSwitcher(): bool
    {
        return true;
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
        return '_main_navbar';
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
                if ($this->currentViewType() == Type_View::Form ||
                    $this->currentViewType() == Type_View::List)
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
}
