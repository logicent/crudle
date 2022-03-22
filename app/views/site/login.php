<?php

use app\modules\setup\models\GeneralSettingsForm;
use app\modules\setup\models\Setup;

$this->title = Yii::t('app', 'Log in');

$businessProfile = Setup::getSettings( GeneralSettingsForm::class );
$this->params['businessLogo'] = $businessProfile->logoPath;
$this->params['businessName'] = $businessProfile->name;
?>

<div class="login-wrapper">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>

<?php $this->registerCssFile("@web/css/login.css") ?>