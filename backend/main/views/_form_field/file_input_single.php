<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;

echo Html::tag('div', 
    Html::tag('span', Yii::t('app', 'No attachment'), ['id' => 'no_attachment']), 
    ['id' => 'file_preview', 'class' => '']);

echo Html::activeFileInput($model->uploadForm, 'file_upload', ['accept' => $fileTypes, 'style' => 'display: none']);

echo Elements::button(Yii::t('app', 'Upload'), [ 'id' => 'upload_btn', 'class' => 'compact mini']) ;

$this->registerJs(<<<JS
    $('#upload_btn').on('click', function(e) {
        $('#uploadform-file_upload')[0].click();
        return false;
    });

    $('#del_file').on('click', function(e) {
        $('#file_preview').html('');
        $('#del_file').toggleClass('disabled');
    });

    $('#uploadform-file_upload').on('change', function() {
        var file = document.getElementById('uploadform-file_upload').file[0];

        $('#no_attachment').remove();
        // row = $('tr').closest('td');

        $('#file_preview').html( file.name );

        var preview = document.querySelector('#file_preview');

        var reader  = new FileReader();
        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
            $('#del_file').toggleClass('disabled');
        } else {
            preview.src = '';
        }
    });
JS
);