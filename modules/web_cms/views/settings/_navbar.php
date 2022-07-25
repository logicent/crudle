<?php

use crudle\ext\web_cms\models\SiteNavHeader;
?>

<div class="ui one column grid">
    <div class="column">
        <?= $form->field($model, 'hideLogin')->checkbox() ?>
        <?= $form->field($model, 'showLanguagePicker')->checkbox() ?>
        <?= $form->field($model, 'includeSearchInTopBar')->checkbox() ?>
    </div>
</div>

<br>

<?= $this->render('@appMain/views/_form_section/item', [
        'model' => new SiteNavHeader(),
        'detailModels' => $this->context->getDetailModels()['headerNav'],
        'form' => $form,
        'formView' => '@appSetup/views/_menu/field_inputs',
        'listColumns' => '@appSetup/views/_menu/list_columns',
        'listId' => 'header_nav',
    ]) ?>