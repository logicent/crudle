<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

// To-Do: allow custom placeholder default to none
$imgPlaceholder = Yii::getAlias('@web') . isset($placeholder) ? $placeholder : '/img/placeholder-image.jpg';
$imgPath = Yii::getAlias('@web/uploads/') . $model->$attribute;
$btnTag = Elements::button(Yii::t('app', 'Attach'), [
            'class' => 'compact basic attach-file',
            'data' => [
                'file-path' => $imgPlaceholder
            ]
        ]);
$imgTag = Elements::image( $model->$attribute != '' ? 
            $imgPath : $imgPlaceholder, [
                'class' => 'bordered rounded', 
            ]);
if ( $this->context->action->id == 'read' ) :
    echo $imgTag;
else :
    echo
        Html::beginTag('div', ['class' => 'field']) .
            Html::activeFileInput( $model->uploadForm, 'file_upload', [
                'accept' => 'image/*', 'style' => 'display: none'
            ]) .
            $form->field($model, $attribute)->hiddenInput(['class' => 'file-path']) .
            Html::a( $imgTag, ['#'], [
                'class' => 'upload-preview',
                'style' => 'display: none;'
            ]) .
            Html::a( $btnTag, ['#'], [
                'class' => 'upload-btn'
            ]) .
            Elements::button(Yii::t('app', 'Clear'), [
                'class' => 'compact basic del-btn',
                'style' => 'display: none',
                'data' => [
                    'file-path' => $imgPlaceholder
                ]
            ]) .
        Html::endTag('div');
endif;
$this->registerJs( $this->render('file_upload.js') );
?>
