<?php

use crudle\app\main\models\setup\GeneralSettingsForm;
use crudle\app\setup\models\Setup;
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div style="max-width: 500px; font-size: 13px; line-height: 18px; font-family: HelveticaNeue, sans-serif;">
        <?= $content ?>
        <br>
        <p><?= Yii::t('app', 'Kind Regards,') ?></p>
        <?php $orgProfile = Setup::getSettings( GeneralSettingsForm::class ) ?>
        <p><?= $orgProfile->name ?></p>
    </div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
