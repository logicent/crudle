<div class="ui attached padded segment">
    <div class="two fields">
        <?= $form->field($model, 'name')->textInput() ?>
        <?= $form->field($model, 'printerName')->textInput() ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'serverIP')->textInput() ?>
        <?= $form->field($model, 'port')->textInput() ?>
    </div>
</div>