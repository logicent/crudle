<div class="ui two column grid">
    <div class="column">
        <?= $form->field($model, 'appName')->textInput(['maxlength' => true]) ?>
        <?= $this->render( '//_form_field/file_input', ['attribute' => 'appLogo',
                'form' => $form,
                'model' => $model,
            ]) ?>
    </div>
    <div class="column">
        <?= $form->field($model, 'disableSignUp')->checkbox()->label('&nbsp;') ?>
    </div>
</div>