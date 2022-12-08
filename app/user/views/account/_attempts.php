<?php

use yii\helpers\Html;
?>
<div class="ui secondary attached padded segment">
    <div class="ui two column grid">
        <div class="column">
            <label class="text-muted"><?= Yii::t('app', 'Failed attempts:') ?>
            </label>
            <!-- $model->getFailedAttempts() -->
            <span id="failed_attempts">None</span>
        </div>
        <div class="right aligned column">
            <?= Html::a(Yii::t('app', 'Un-block User'), ['unblock-user', 'id' => $model->id],
                    [
                        'id' => 'unblock_user',
                        'class' => 'compact ui small button',
                    ]) ?>
        </div>
    </div>
</div>