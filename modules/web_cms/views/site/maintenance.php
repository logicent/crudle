<?php
/* @var yii\web\View $this */

use icms\FomanticUI\Elements;

$this->context->layout = false;
?>

<?= Elements::header(Yii::t('app', 'Maintenance')) ?>

<p><?= Yii::t('app', 'Hey,<br> pole sana, the site is currently under maintenance.
<br> We\'ll be back soon.') ?></p>
