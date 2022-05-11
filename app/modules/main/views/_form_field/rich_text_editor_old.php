<?php

use crudle\app\assets\QuillAsset;
QuillAsset::register($this);

$context_id = $this->context->id;
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
    echo $form->field($model, $attribute)->widget(\bizley\quill\Quill::class, []);
    // echo  $form->field($model, $attribute)->textarea([
    //             'rows' => 9,
    //             'id' => 'quill_rte__' . $attribute,
    //             'class' => 'quill-rte',
    //             'data' => [
    //                 'formName' => $model->formName()
    //             ]
    //         ]);
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

        var quill_rte = new Quill('#quill_rte__{$attribute}', {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });

        $('form#'{$model->formName()}).on('beforeValidate', function(e)
        {
            if (quill_rte.getLength() > 1) {
                // $('#quill_rte__{$attribute}').val(JSON.stringify(quill_rte.getContents()));
                $('#quill_rte__{$attribute}').val(quill.root.innerHTML);
            }
        });

        $( document ).ready(
            function() {
                quill_rte.setContents(value);
            });
    ";
endif ?>

<!-- <div id="<?= $attribute?>"></div> -->

<?php $this->registerJs($script);