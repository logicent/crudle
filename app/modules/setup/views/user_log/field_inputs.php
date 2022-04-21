<div class="ui attached padded segment">
    <div class="two fields">
        <?= $form->field($model, 'id')->textInput(['readonly' => true]) ?>
        <?= $form->field($model, 'status')->textInput(['readonly' => true]) ?>
    </div>
</div>
<div class="ui attached padded segment">
    <div class="two fields">
        <?= $form->field($model, 'login_at')->textInput(['readonly' => true]) ?>
        <?= $form->field($model, 'login_ip')->textInput(['readonly' => true]) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'logout_at')->textInput(['readonly' => true]) ?>
        <?= $form->field($model, 'logout_ip')->textInput(['readonly' => true]) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'user_id')->textInput(['readonly' => true]) ?>
        <?= $form->field($model, 'session_id')->textInput(['readonly' => true]) ?>
    </div>
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