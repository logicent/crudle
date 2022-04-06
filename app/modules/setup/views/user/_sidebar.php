<?php

use yii\helpers\Url;
use app\modules\main\models\auth\User;
use app\modules\main\models\auth\Person;

$model = $this->context->model;

if ($this->context->action->id == 'index') : ?>

<div class="ui vertical segment">
    <div class="ui vertical text menu">
        <a href="#<?= Url::to(['index', 'UserSearch' => ['status' => User::STATUS_ACTIVE]]) ?>" class="item">
            <?= Yii::t('app', 'Active') ?>
            <!-- Ignore Administrator in count (hack please improve this) -->
            <div class="ui mini green circular label"><?= Person::find()->where(['status' => User::STATUS_ACTIVE])->count() - 1 ?></div>
        </a>
        <a href="#<?= Url::to(['index', 'UserSearch' => ['status' => User::STATUS_DELETED]]) ?>" class="item">
            <?= Yii::t('app', 'Deleted') ?>
            <div class="ui mini red circular label"><?= Person::find()->where(['status' => User::STATUS_DELETED])->count() ?></div>
        </a>    
    </div>
</div>
<?php
endif;

if ( $this->context->action->id !== 'index' ) :
    // echo $this->render('@app_main/views/_form_field/file_input', [
    //             'attribute' => 'avatar',
    //             'model' => $model,
    //         ]);
endif;

if ( $this->context->action->id != 'create' ) :
    // $approvedBy = Person::findOne(['id' => $model->approved_by]);
?>

<div class="ui hidden divider"></div>

<div id="sidebar">
    <?= $this->render('@app_main/views/_form/_sidebar_links') ?>
</div>
<?php
endif ?>