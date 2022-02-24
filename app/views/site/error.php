<?php

use app\modules\setup\models\Setup;
use app\modules\setup\models\BusinessProfileForm;
use yii\helpers\Html;
use yii\helpers\Url;
use Zelenin\yii\SemanticUI\Elements;

$this->title = $name;

$businessProfile = Setup::getSettings( BusinessProfileForm::class );
$this->params['businessLogo'] = $businessProfile->logoPath;
$this->params['businessName'] = $businessProfile->name;
?>

<div class="site-error">
    <!-- <div class="ui divider hidden"></div> -->
    <div class="ui basic segment">
        <!-- <i class="close icon"></i> -->
        <div class="ui header">
            <!-- <?= Elements::icon('warning', ['class' => 'mini']) ?> -->
            <?= Html::encode($this->title) ?>
        </div>
        <p>
            <?= nl2br(Html::encode($message)) ?>
        </p>
        <div class="ui hidden divider"></div>
        <div>
            Hi <?= Yii::$app->user->identity->person->firstname ?>,
        </div>
        <br>
        <p class="description">
            Sorry, the above error occurred while <?= Yii::$app->params['appShortName'] ?> was processing your request.<br><br>
            Please ask a <a href="/people/index?PersonSearch&user_role=System Manager" style="text-decoration: underline">System Manager</a> to help you resolve the issue.<br>
            Thank you.
        </p>
        <!-- TODO: Add the ability to send the error report to System Administrator/Manager -->
        <!-- Please send this error report to your System Manager.<br> -->

        <?= Html::a('Go Home', Url::home(), ['class' => 'compact ui small primary button']) ?>
    </div>

</div>
