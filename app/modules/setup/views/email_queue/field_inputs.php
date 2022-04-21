<?php

use yii\helpers\Html;

?>

<div class="ui attached padded segment">
    <div class="two fields">
        <?= $form->field($model, 'id')->textInput(['readonly' => true]) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'status')->textInput(['readonly' => true]) ?>
        <?= $form->field($model, 'sent_at')->textInput(['readonly' => true]) ?>
    </div>
</div>
<div class="ui secondary attached padded segment">
    <div class="ui two column grid">
        <div class="column">
            <label class="text-muted"><?= Yii::t('app', 'Failed attempts:') ?>
            </label>
            <!-- $model->getFailedAttempts() -->
            <span id="failed_attempts">None</span>
        </div>
        <div class="right aligned column">
            <?= Html::a(Yii::t('app', 'Re-send notification'), ['resend-notification', 'id' => $model->id],
                    [
                        'id' => 're_send',
                        'class' => 'compact ui small button',
                    ]) ?>
        </div>
    </div>
</div>
<div class="ui attached padded segment">
    <?= $form->field($model, 'from')->textInput(['readonly' => true]) ?>
    <?= $form->field($model, 'to')->textInput(['readonly' => true]) ?>
    <?= $form->field($model, 'cc')->textarea(['readonly' => true, 'rows' => 4]) ?>
    <?= $form->field($model, 'subject')->textInput(['readonly' => true]) ?>
    <?= $form->field($model, 'message')->textarea(['readonly' => true, 'rows' => 6]) ?>
    <?= $form->field($model, 'attachments')->textarea(['readonly' => true, 'rows' => 6]) ?>

    <?php //= $form->field($model, 'created_at')->textInput(['readonly' => true]) ?>
    <?php //= $form->field($model, 'created_by')->textInput(['readonly' => true, 'value' => $model->createdBy->full_name]) ?>
    <?php //= $form->field($model, 'updated_at')->textInput(['readonly' => true]) ?>
    <?php //= $form->field($model, 'updated_by')->textInput(['readonly' => true, 'value' => $model->updatedBy->full_name]) ?>
</div>
<?php
$this->registerJs(<<<JS
    $('#re_send').on('click',
        function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: $(this).attr('href'),
                // data: {},
            })
            .done(function (response) {
                alert(response);
            })
            .fail(function () {
                // request failed
            });
    });
JS);