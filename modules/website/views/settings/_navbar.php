<?php

use website\models\SiteNavHeader;
?>

<div class="ui one column grid">
    <div class="column">
        <?= $form->field($model, 'hideLogin')->checkbox() ?>
        <?= $form->field($model, 'showLanguagePicker')->checkbox() ?>
        <?= $form->field($model, 'includeSearchInTopBar')->checkbox() ?>
    </div>
</div>

<div class="ui hidden divider"></div>

<?= $this->render('@app_main/views/_form_section/item', [
        'model' => new SiteNavHeader(),
        'detailModels' => $this->context->detailModels()['headerNav'],
        'form' => $form,
        'formView' => '@app_setup/views/_menu/field_inputs',
        'listColumns' => '@app_setup/views/_menu/list_columns',
        'listId' => 'header_nav',
    ]) ?>