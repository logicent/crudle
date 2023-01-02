<?php
/**
 * This is the template for generating a module class file.
 */

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator crudle\kit\generators\module\Generator */

$className = $generator->moduleClass;
$pos = strrpos($className, '\\');
$ns = ltrim(substr($className, 0, $pos), '\\');
$className = substr($className, $pos + 1);

$moduleName = Inflector::camel2words($generator->getModuleClass());

echo "<?php\n";
?>

namespace <?= $ns ?>;

use Yii;

/**
 * <?= $generator->moduleID ?> module definition class
 */
class <?= $className ?> extends \crudle\app\Module
{
    public $moduleName = '<?= $moduleName ?>';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = '<?= $generator->getControllerNamespace() ?>';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        Yii::configure($this, require __DIR__ . '/config.php');
    }
}
