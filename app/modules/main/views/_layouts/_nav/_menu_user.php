<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;


$username = Yii::$app->session->has('dbConfig') ? Yii::$app->session->get('dbConfig')['username'] : null;
$host = Yii::$app->session->has('dbInfo') ? Yii::$app->session->get('dbInfo')['host'] : null;
?>
<div class="ui dropdown item right">
<?php
    if (Yii::$app->session->has('dbConfig')) :
        echo $username . '@' . $host;
    endif
?>&ensp;
    <?= Elements::icon('down small chevron') ?>
    <div class="menu nav-menu">
        <?= Html::a(Yii::t('app', 'Log out'),
                    ['/admin/admin/logout'], [
                        'class' => 'item',
                        'data' => ['method' => 'post']
                    ]) ?>
    </div><!-- ./menu -->
</div><!-- ./dropdown item -->