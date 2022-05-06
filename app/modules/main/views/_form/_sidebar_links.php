<?php

use crudle\app\main\models\auth\People;

$model = $this->context->model;

$createdBy = People::findOne(['user_id' => $model->created_by]);
$updatedBy = People::findOne(['user_id' => $model->updated_by]);
?>
<div class="ui vertical text menu">
    <a href="#comment_timeline" class="item">
        <?= Yii::t('app', 'Comments') ?>
        <div class="ui circular label"><?= $model->commentsCount ?></div>
    </a>
</div>

<div class="ui divider hidden"></div>

<div class="ui vertical text menu">
    <?php if (!is_null($updatedBy)) : ?>
    <div class="item">
        <strong>
            <?= $updatedBy->user_id == Yii::$app->user->id ? Yii::t('app', 'You') : $updatedBy->full_name ?>
        </strong>
        <span>
            <?= Yii::t('app', 'edited this') ?><br><?= Yii::$app->formatter->asRelativeTime($model->updated_at) ?>
        </span>
    </div>
    <?php endif ?>

    <div class="ui divider hidden"></div>

    <?php if (!is_null($createdBy)) : ?>
    <div class="item">
        <strong>
            <?= $createdBy->user_id == Yii::$app->user->id ? Yii::t('app', 'You') : $createdBy->full_name ?>
        </strong>
        <span>
            <?= Yii::t('app', 'created this') ?><br><?= Yii::$app->formatter->asRelativeTime($model->created_at) ?>
        </span>
    </div>
    <?php endif ?>
</div>
