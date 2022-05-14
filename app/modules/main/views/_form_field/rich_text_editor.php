<?php

$context_id = $this->context->id;
if ($this->context->action->id == 'read') :
    echo $form->field($model, $attribute)->textarea();
else :
    echo $form->field($model, $attribute)->widget(\bizley\quill\Quill::class, [
            // 'modules' => [
            //     'smart-breaker' => true,
            // ],
            // 'localAssets' => true,
            // 'toolbarOptions' => [['bold', 'italic', 'underline'], [['color' => []]]],
        ]);
endif ?>