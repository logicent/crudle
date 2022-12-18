<?php

use crudle\app\setup\models\Setup;
use crudle\ext\web_cms\models\WebsiteSettingsForm;

$webSettings = Setup::getSettings( WebsiteSettingsForm::class );

$this->beginContent('@appMain/layouts/base.php') ?>

    <main class="ui container" style="margin-top: 110px;">
        <div class="ui stackable grid">
            <div id="content" class="sixteen wide column">
                <div class="ui basic segment">
                    <?= $content ?>
                </div>
            </div>
        </div>

        <footer class="ui basic segment text-muted">
            <div class="ui two column stackable grid">
                <div class="eight wide column">
                    <!-- <p> -->
                        <?= $webSettings->copyright ??= Yii::$app->params['appCopyright'] .'&nbsp;'. Yii::$app->params['appVersion'] ?>
                    <!-- </p> -->
                </div>
                <div class="eight wide column right aligned">
                    <!-- <p> -->
                        <?= Yii::$app->params['appName'] ?>
                    <!-- </p> -->
                </div>
            </div>
        </footer>
    </main>
<?php
    $this->registerCss($this->render('@extModules/web_cms/views/_assets/site.css'));
$this->endContent() ?>
