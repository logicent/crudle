<?php

use yii\helpers\Html;

$isReadonly = $this->context->isReadonly();
?>

<?= $form->field($model, $attribute)->radioList($items, [
        'class' => $isReadonly ? 'disabled custom-listbox' : 'custom-listbox', // for container styles
        'item' => 
        function ($index, $label, $name, $checked, $value) 
        {
            return Html::tag('div', 
                Html::tag('div', 
                    Html::radio($name, $checked, [
                            'id' => $value,
                            'class' => 'hidden ',
                            'value' => $value
                        ]) .
                    Html::label($label, $name), [
                        'id' => 'w' . $index,
                        'class' => 'ui checkbox radio'
                    ]
                ),
                ['class' => 'field']
            );
        }
    ]
);

$this->registerJs(<<<JS
    $('.ui.checkbox').checkbox();

    $('.custom-listbox').on('click', function() {
        count = 0;
        items = $(this).find('.ui.checkbox');
        items.each(function(i) {
            item = $(this).find('input');
            if (item.prop('checked')) // == true
                count += 1;
        });
        selectedCount = $(this).siblings('label').children('span.selected-list-options');
        selectedCount.text(count);
    });
JS) ?>
