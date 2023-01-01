<?php

use bizley\quill\Quill;
use icms\FomanticUI\Elements;
use yii\helpers\Html;

$readOnly = $this->context->action->id == 'read';

if ($readOnly) :
    $label = isset($fieldLabel) ? Html::tag('div', $fieldLabel, [
        'class' => 'ui small header',
    ]) : null;
    echo $label;
    echo Html::tag('div', $fieldValue, [
        'class' => 'ui segment',
        'style' => "
            color: #555;
            border: 1px solid #dee5e7;
            background-color: #fafbfc;
        "
    ]);
else:
    $toolbar = isset($toolbar) ? $toolbar : Quill::TOOLBAR_BASIC;
    $field = $form->field($model, $attribute)->widget(Quill::class, [
            // 'autoIdPrefix' => 'quill-',
            'theme' => Quill::THEME_SNOW,
            'toolbarOptions' => $toolbar,
            // 'icons' => [
            //     'bold' => Elements::icon('grey bold'),
            //     'italic' => Elements::icon('grey italic'),
            //     'underline' => Elements::icon('grey underline'),
            //     'strike' => Elements::icon('grey strikethrough'),
            //     'code-block' => Elements::icon('grey code'),
            //     // 'list' => Elements::icon('grey ordered list'),
            //     // 'list' => Elements::icon('grey unordered list'),
            //     'link' => Elements::icon('grey linkify'),
            //     'image' => Elements::icon('grey large image outline'),
            //     'video' => Elements::icon('grey large film'),
            //     'blockquote' => Elements::icon('grey quote right'),
            // ],
            // 'placeholder' => '',
            // 'hiddenOptions' => [],
            // 'tag' => 'div,'
            'options' => [
                // 'class' => '',
                'style' => "
                    min-height: 106px;
                    max-height: 606px;
                    overflow-y: auto;
                    color: #555;
                    font-family: Ubuntu, 'Lato', 'Helvetica Neue', Arial, sans-serif;
                    font-size: 16px;
                    background: aliceblue;
                    border: 1px solid #dee5e7;
                    border-radius: 0em 0em 0.28571429rem 0.28571429rem;
                    -webkit-box-shadow: 0.05rem 0.035rem 0.15rem inset #dee5e7;
                    box-shadow: 0.05rem 0.035rem 0.15rem inset #dee5e7;
                }
                "
            ],
            // 'allowResize' => true, // default: false
            'modules' => [
                'smart-breaker' => true, // Shift+Enter
            ],
            'localAssets' => true, // default: false - fetches via CDN
            'readOnly' => $readOnly,
            'js' => "{quill}.enable({$readOnly});",
        ]);
    if (isset($fieldLabel)) :
        echo $field->label($fieldLabel);
    else :
        echo $field;
    endif;
endif;

$this->registerCss(<<<CSS
    .ql-editor p {
        line-height: 1.895em;
    }
    .ql-toolbar.ql-snow {
        background: #fafbfc;
        border: 1px solid #dee5e7;
        border-radius: 0.28571429rem 0.28571429rem 0em 0em;
    }
CSS);