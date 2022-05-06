<?php

use crudle\ext\cms\models\SiteNavFooter;
?>

<div class="ui one column grid">
    <div class="eight wide column">
        <?= $this->render('@app_main/views/_form_field/file_input', ['attribute' => 'footerLogo',
                'form' => $form,
                'model' => $model,
            ]) ?>
        <?= $form->field($model, 'copyright')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="column">
        <?= $form->field($model, 'address')->textarea(['rows' => 9]) ?>
        <?php /*= $this->render('@app_main/views/_form_field/rich_text_editor', ['attribute' => 'address',
                'form' => $form,
                'model' => $model,
            ]) */
        ?>
        <?= $form->field($model, 'showFooterSignup')->checkbox() ?>
    </div>
</div>

<br>

<?= $this->render('@app_main/views/_form_section/item', [
        'model' => new SiteNavFooter(),
        'detailModels' => $this->context->getDetailModels()['footerNav'],
        'form' => $form,
        'formView' => '@app_setup/views/_menu/field_inputs',
        'listColumns' => '@app_setup/views/_menu/list_columns',
        'listId' => 'footer_nav',
    ]) ?>