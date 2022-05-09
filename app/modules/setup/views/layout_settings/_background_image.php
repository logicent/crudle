<div class="ui two column stackable grid">
    <div class="column center aligned">
        <?= $this->render( '@appMain/views/_form_field/file_input', [
                'attribute' => 'bgImagePath',
                'model' => $model,
                'form' => $form,
            ]) ?>
    </div>
    <div class="column">
        <?= $form->field( $model, 'bgImageStyles' )->textarea([
                'rows' => 6,
                'style' => 'max-height: 280px !important',
                'maxlength' => true
            ]) ?>
    </div>
</div>