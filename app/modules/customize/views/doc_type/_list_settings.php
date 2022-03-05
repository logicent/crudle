<div class="two fields">
    <?= $form->field( $model, 'sort_field' )->dropDownList([]) ?>
    <?= $form->field( $model, 'sort_order' )->dropDownList([
        'ASC' => 'Ascending',
        'DESC' => 'Descending'
    ]) ?>
</div>