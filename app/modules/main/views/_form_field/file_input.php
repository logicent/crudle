<?php

use crudle\app\main\enums\Type_Form_View;
use yii\helpers\Html;
use icms\FomanticUI\Elements;

// To-Do: allow custom placeholder default to none
$placeholder = in_array('placeholder',array_keys(get_defined_vars())) ? $placeholder : null;
$imgPlaceholder = Yii::getAlias('@web') . $placeholder;
$imgPath = Yii::getAlias('@web/uploads/') . $model->$attribute;
$btnTag = Elements::button(Yii::t('app', 'Attach'), [
            'class' => 'compact basic attach-file',
            'data' => [
                'file-path' => $imgPlaceholder
            ]
        ]);
$imgTag = Elements::image($model->$attribute != '' ? 
            $imgPath : $imgPlaceholder, [
                'class' => 'bordered rounded centered', 
            ]);
echo
    Html::beginTag('div', ['class' => 'field']) .
        Html::activeFileInput( $model->uploadForm, 'file_upload', [
            'accept' => isset($fileTypes) ? $fileTypes : 'image/*', 'style' => 'display: none'
        ]) .
        // $form->field($model, $attribute)->hiddenInput(['class' => 'file-path']) .
        Html::activeHiddenInput($model, $attribute, [
            'class' => 'file-path',
            'data' => ['name' => $attribute]
        ]) .
        Html::activeLabel($model, $attribute) .
        Html::a( $imgTag, ['#'], [
            'class' => 'upload-preview',
            'style' => empty($imgTag) ? 'display: none' : '',
        ]);
        if ($imgPlaceholder || $model->$attribute) :
            echo Html::tag('br');
        endif;
        if ($this->context->action->id == 'read' || // isReadonly()
            $this->context->formViewType() == Type_Form_View::Single) :
            echo
                Html::a($btnTag, ['#'], [
                    'class' => 'upload-btn'
                ]);
            echo !empty($model->$attribute) ? '&emsp;' : '';
            echo
                Elements::button(Yii::t('app', 'Clear'), [
                    'class' => 'compact basic del-btn',
                    'style' => empty($model->$attribute) ? 'display: none' : '',
                    'data' => [
                        'file-path' => $imgPlaceholder
                    ]
                ]);
        endif;
echo
    Html::endTag('div');
$this->registerJs( $this->render('file_upload.js') );
?>
