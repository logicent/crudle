<div class="ui two column stackable grid">
    <div class="column center aligned">
        <?= $this->render( '@appMain/views/_form_field/file_input', [
                'attribute' => 'logoPath',
                'model' => $model,
                'form' => $form,
                'placeholder' => '/img/placeholder-logo.jpg'
            ]) ?>
    </div>
</div>