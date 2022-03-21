<?php

use yii\helpers\Html;

?>

    <div class="ui attached padded segment">
        <div class="two fields">
            <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="ui attached padded segment">
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