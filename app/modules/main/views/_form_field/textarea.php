<?= $form
        ->field($model, $attribute)
        ->textarea([
            'maxlength' => true,
            'rows' => isset($rows) ? $rows : 6,
            'style' => isset($style) ? $style : 'resize:none',
        ]) ?>
