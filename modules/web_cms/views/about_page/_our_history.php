<div class="ui one column grid">
    <div class="eight wide column">
        <?= $form->field($model, 'ourHistoryHeading')->textInput(['maxlength' => 140]) ?>
    </div>
    <div class="column">
        <?= $this->render('@appMain/views/_form_field/rich_text_editor', [
                'model' => $model,
                'form' => $form,
                'attribute' => 'ourHistory',
            ]) ?>
    </div>
</div>