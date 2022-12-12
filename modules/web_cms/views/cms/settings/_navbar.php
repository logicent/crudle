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

<?= $this->render('@appMain/views/_form_table/item', [
        'modelClass' => SiteNavHeader::class
    ]) ?>