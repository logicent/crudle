<?php
/* @var $this yii\web\View */
/* @var $generator crudle\kit\generators\module\Generator */

use yii\helpers\Inflector;

echo "<?php\n";
?>

$this->title = Yii::t('app', '<?= Inflector::camel2words($generator->getModuleClass()) ?>');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['/<?= $generator->moduleID ?>']];

$menuList = require __DIR__ . '/_menu.php';

echo $this->render('@appMain/views/_layouts/_menu_in_page', ['menuList' => $menuList]);
