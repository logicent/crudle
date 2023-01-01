<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;
?>

<div class="ui padded segment">
    <?= Elements::buttonsGroup(
            Elements::button(Elements::icon('refresh') . 'Preview') . Elements::button(Elements::icon('external') . 'Visit URL'),
            ['class' => 'small']) ?>
    <?= Elements::divider(null, ['class' => 'hidden']) ?>
    <?= $this->render('@appMain/views/_form_field/checkbox', [
            // 'form' => $form,
            'model' => $model,
            'attribute' => 'published',
            'options' => ['class' => 'toggle']
        ]) ?>
    <?= Elements::divider(null, ['class' => 'hidden']) ?>
    <?= $this->render('@appMain/views/_form_field/date_input', [
            'form' => $form,
            'model' => $model,
            'attribute' => 'date_published',
        ]) ?>
    <?=  $this->render('@appMain/views/_form_field/textarea', [
            'form' => $form,
            'model' => $model,
            'attribute' => 'tags',
            'maxlength' => true,
            'rows' => 2,
            'style' => 'resize:none',
        ]) ?>
    <?= $this->render('@appMain/views/_form_field/file_input', [
            'form' => $form,
            'model' => $model,
            'attribute' => 'featured_image',
            'placeholder' => '@web/img/placeholder-image.jpg'
        ]) ?>
    <?= $form->field($model, 'word_count')->textInput(['readonly' => true]) ?>
    <?= $form->field($model, 'post_read_time')->textInput(['readonly' => true]) ?>
    <?= $form->field($model, 'post_views')->textInput(['readonly' => true]) ?>
    <?= $form->field($model, 'post_likes')->textInput(['readonly' => true]) ?>
</div>
