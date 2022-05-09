<?php
/* @var yii\web\View $this */

use Zelenin\yii\SemanticUI\Elements;

$this->context->layout = false;
?>

<?= Elements::header(Yii::t('app', 'Maintenance')) ?>

<p><?= Yii::t('app', 'Hey,<br> pole sana, the site is currently under maintenance.
<br> We\'ll be back soon.') ?></p>
