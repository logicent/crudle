<?php

use crudle\app\main\enums\Type_Form_View;
use yii\helpers\Html;
use icms\FomanticUI\Elements;

$inputPlaceholder = isset($placeholder) ? $placeholder : null;
$filePath = Yii::getAlias('@web/uploads/') . $model->$attribute;
$btnTag = Elements::button(Yii::t('app', 'Upload'), [
            'class' => 'compact basic attach-file',
        ]);
$inputTag = Html::tag('div',
    Html::activeLabel($model, $attribute, ['label' => 'Import file']) . 
    Html::activeTextInput($model, $attribute, [
        'class' => 'file-input',
        'readonly' => true,
        // 'placeholder' => Yii::t('app', 'Click here to upload'),
    ]),
    ['class' => 'field', 'style' => 'margin: 0em;']
);
echo
    Html::beginTag('div', ['class' => 'field']) .
        Html::activeFileInput( $model->uploadForm, 'file_upload', [
            'accept' => isset($fileTypes) ? $fileTypes : 'application/*', 'style' => 'display: none'
        ]) .
        $inputTag;
        if ($this->context->action->id !== 'read' || // isReadonly()
            $this->context->formViewType() == Type_Form_View::Single) :
            echo
                Html::a('<br>' . $btnTag, ['#'], [
                    'class' => 'upload-btn'
                ]);
            echo !empty($model->$attribute) ? '&emsp;' : '';
            echo '<br>' . 
                Elements::button(Yii::t('app', 'Clear'), [
                    'class' => 'compact basic del-btn',
                    'style' => empty($model->$attribute) ? 'display: none' : '',
                ]);
        endif;
echo
    Html::endTag('div');
$this->registerJs( $this->render('file_upload_file.js') );