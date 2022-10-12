<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;

echo Html::tag('div', $model->$attribute, ['class' => 'file-preview small']);

echo Html::activeFileInput($model->uploadForm, "[$rowId]file_uploads[]", [
        'class' => 'file-uploads',
        'multiple' => true, 
        'accept' => $fileTypes, 
        'style' => 'display: none',
        'hiddenOptions' => [
            'class' => 'file-upload-list'
        ]
    ]);

echo Elements::button(Yii::t('app', 'Upload'), ['class' => 'compact mini upload-btn']) ;

$this->registerJs(<<<JS
    $('#upload').on('click', '.upload-btn', function(e) 
    {
        e.stopImmediatePropagation();

        file_uploads = $(this).closest('tr').find('td > input.file-uploads');
        file_uploads[0].click();
        
        return false;
    });

    $('.file-uploads').on('change', function(e) 
    {
        e.stopImmediatePropagation();

        var files = $(this)[0].files;
        var fileCount = $(this)[0].files.length;

        file_preview = $(this).closest('tr').find('td div.file-preview');
        
        if (files) {
            for (var i = 0; i < fileCount; i++) {
                file_preview.append('<div>' + files[i].name + '</div><br>');
            }
        }
        // previewFiles();
    });

    function previewFiles() 
    {
        var preview = document.querySelector('.file-preview');
        var files   = document.querySelector('input[type=file]').files;

        function readAndPreview(file) 
        {
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }
            reader.readAsDataURL(file);
        }

        if (files) {
            [].forEach.call(files, readAndPreview);
        } else {
            preview.src = '';
        }
    }    
JS
);