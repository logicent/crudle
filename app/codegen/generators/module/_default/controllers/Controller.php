<?php
/**
 * This is the template for generating a controller class within a module.
 */

/* @var $this yii\web\View */
/* @var $generator crudle\kit\generators\module\Generator */

echo "<?php\n";
?>

namespace <?= $generator->getControllerNamespace() ?>;

use crudle\app\main\controllers\base\ViewController;
use crudle\app\main\enums\Type_View;

/**
 * <?= $generator->getModuleClass() ?> controller for the `<?= $generator->moduleID ?>` module
 */
class <?= $generator->getModuleClass() ?>Controller extends ViewController
{
    public function actions()
    {
        return [
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    // ViewInterface
    public function defaultActionViewType()
    {
        return Type_View::Workspace;
    }

    public function showViewSidebar(): bool
    {
        return false;
    }
}
