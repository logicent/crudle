<!-- navbar items -->
<div class="ui one column grid">
    <div class="column">
        <?= $form->field($model, 'hideLogin')->checkbox() ?>
        <?= $form->field($model, 'showLanguagePicker')->checkbox() ?>
        <?= $form->field($model, 'includeSearchInTopBar')->checkbox() ?>
    </div>
</div>