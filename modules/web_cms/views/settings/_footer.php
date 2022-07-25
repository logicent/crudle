<?php

use crudle\ext\web_cms\models\SiteNavFooter;
?>

<div class="ui one column grid">
    <div class="eight wide column">
        <?= $this->render('@appMain/views/_form_field/file_input', ['attribute' => 'footerLogo',
                'form' => $form,
                'model' => $model,
            ]) ?>
        <?= $form->field($model, 'copyright')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="column">
        <?= $form->field($model, 'address')->textarea(['rows' => 9]) ?>
        <?php /*= $this->render('@appMain/views/_form_field/rich_text_editor', ['attribute' => 'address',
                'form' => $form,
                'model' => $model,
            ]) */
        ?>
        <?= $form->field($model, 'showFooterSignup')->checkbox() ?>
    </div>
</div>

<br>

<?= $this->render('@appMain/views/_form_section/item', [
        'model' => new SiteNavFooter(),
        'detailModels' => $this->context->getDetailModels()['footerNav'],
        'form' => $form,
        'formView' => '@appSetup/views/_menu/field_inputs',
        'listColumns' => '@appSetup/views/_menu/list_columns',
        'listId' => 'footer_nav',
    ]) ?>