<?php

use bizley\quill\Quill;

$readOnly = $this->context->action->id == 'read';

echo $form->field($model, $attribute)->widget(Quill::class, [
        // 'autoIdPrefix' => 'quill-',
        'theme' => Quill::THEME_SNOW, // alt: THEME_BUBBLE
        'toolbarOptions' => Quill::TOOLBAR_BASIC, // alt: TOOLBAR_FULL
        // 'icons' => [],
        // 'placeholder' => '',
        // 'hiddenOptions' => [],
        // 'tag' => 'div,'
        'options' => [
            // 'class' => '',
            'style' => "
                min-height: 80px;
                max-height: 400px;
                color: #555;
                font-size: 16px;
                background: aliceblue;
            "
        ],
        'allowResize' => true, // default: false
        'modules' => [
            'smart-breaker' => true, // Shift+Enter
        ],
        'localAssets' => true, // default: false - fetches via CDN
        'readOnly' => $readOnly,
        'js' => "{quill}.enable({$readOnly});",
    ]) ?>