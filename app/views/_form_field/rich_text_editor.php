<?php

use app\assets\QuillAsset;
QuillAsset::register($this);

if ($this->context->action->id == 'read') :
    $script = "
        var quill_{$attribute} = new Quill('#" . $attribute . "', {
            modules: {
                toolbar: false
            },
        });
        $( document ).ready(function() {
            quill_{$attribute}.setContents({$model->$attribute});
            quill_{$attribute}.enable(false);
        });
    ";
else :
    echo  $form->field($model, $attribute)->textarea(['rows' => 6])->hiddenInput();
    $script = "
        var delta;
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],
            [{header: []}],
            [{'list' : 'ordered'}, {'list' : 'bullet'}],
            [{'indent' : '+1'}, {'indent' : '-1'}],
            [{'direction' : 'rtl'}],
            ['link'],
            [{'color' : []}, {'background' : []}],
            [{'align' : []}],

        ];

        var quill_{$attribute} = new Quill('#" . $attribute . "', {
            // modules: {
                //     toolbar: toolbarOptions
                // },
                theme: 'snow'
            });

        $('form#{$model->formName()}').on('beforeValidate', function(e)
        {
            if (quill_{$attribute}.getLength() > 1){
                $('#{$context_id}-{$attribute}').val(JSON.stringify(quill_{$attribute}.getContents()));
            }
        });

        $( document ).ready(function() {
            quill_{$attribute}.setContents({$model->$attribute});
        });
    ";
endif ?>

<div id="<?= $attribute?>"></div>

<?php $this->registerJs($script);?>
