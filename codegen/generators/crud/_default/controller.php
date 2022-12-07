<?php
/**
 * This is the template for generating a CRUD controller class file.
 */

use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator crudle\kit\generators\crud\Generator */

$controllerClass = StringHelper::basename($generator->controllerClass);
$modelClass = StringHelper::basename($generator->modelClass);
$searchModelClass = StringHelper::basename($generator->searchModelClass);
if ($modelClass === $searchModelClass) {
    $searchModelAlias = $searchModelClass . 'Search';
}
$modulePath = dirname($generator->getViewPath(), 2);
$moduleDir = StringHelper::basename($modulePath);

echo "<?php\n";
?>

namespace <?= StringHelper::dirname(ltrim($generator->controllerClass, '\\')) ?>;

use crudle\app\crud\controllers\CrudController;
use crudle\app\main\enums\Type_View;
use crudle\ext\<?= $moduleDir ?>\models\<?= $modelClass ?>;
use crudle\ext\<?= $moduleDir ?>\models\search\<?= $searchModelClass ?>;

/**
 * <?= $controllerClass ?> for the `<?= $modelClass ?>` model
 */
class <?= $controllerClass ?> extends CrudController
{
    public function modelClass(): string
    {
        return <?= $modelClass ?>::class;
    }

    public function searchModelClass(): string
    {
        return <?= $searchModelClass ?>::class;
    }
}
