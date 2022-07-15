<div class="ui padded segment">
    <div class="two fields">
        <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'status')->checkbox(['class' => 'toggle'])->label('&nbsp;') ?>
    </div>
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
