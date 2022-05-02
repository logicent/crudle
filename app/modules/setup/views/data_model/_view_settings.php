<div class="ui two column grid">
    <div class="column">
        <?= $form->field( $model, 'title_field' )->textInput( ['maxlength' => true]) ?>
        <?= $form->field( $model, 'image_field' )->textInput( ['maxlength' => true]) ?>
    </div>
    <div class="column">
        <?= $form->field( $model, 'sort_field' )->dropDownList([]) ?>
        <?= $form->field( $model, 'sort_order' )->dropDownList([
                'ASC' => 'Ascending',
                'DESC' => 'Descending'
            ]) ?>
    </div>
</div>