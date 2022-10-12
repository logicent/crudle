<?php

use crudle\app\setup\models\LayoutSettingsForm;
use crudle\app\setup\models\Setup;

$layoutSettings = Setup::getSettings( LayoutSettingsForm::class );

$this->beginContent('@appMain/views/_layouts/base.php') ?>

    <div class="ui container">
        <div class="ui stackable grid">
            <div id="content" class="sixteen wide column">
                <?= $content ?>
            </div>
        </div>

        <div class="ui basic segment">
            <div class="ui two column stackable grid">
                <div class="eight wide column">
                    <!-- <p> -->
                        <?= $layoutSettings->copyrightLabel ?
                            $layoutSettings->copyrightLabel :
                            Yii::$app->params['appCopyright'] .'&nbsp;'. Yii::$app->params['appVersion'] ?>
                    <!-- </p> -->
                </div>
                <div class="eight wide column right aligned">
                    <!-- <p> -->
                        <?= Yii::$app->params['appName'] ?>
                    <!-- </p> -->
                </div>
            </div>
        </div>
    </div>
<?php
    $this->registerCssFile("@web/css/site.css");
$this->endContent();