<div class="ui one column grid">
    <div class="column">
        <?= $this->render('@appMain/views/_form_field/file_input', ['attribute' => 'brandImage',
                'form' => $form,
                'model' => $model,
            ]) ?>
        <?= $form->field($model, 'brandHtml')->textarea([
                'rows' => 9,
                'style' => 'padding: 0em; font-size: 1em; font-family: ubuntu mono;'
            ]) ?>
        <?= $form->field($model, 'setBannerFromImage')->checkbox() ?>
        <?= $this->render('@appMain/views/_form_field/file_input', ['attribute' => 'favicon',
                'form' => $form,
                'model' => $model,
            ]) ?>
    </div>
</div>