<?php

use icms\FomanticUI\Elements;
?>
<div class="ui padded segment">
    <!-- [
    'modules' => [
        'syntax' => true, // Include syntax module
    ],
        'toolbarOptions' => [['code-block']] // Include button in toolbar
    ] -->
    <?= $form->field($model, 'sql_cmd')->textarea(['rows' => 8]) ?>

    <?= Elements::button(Yii::t('app', 'Test query'), [
            'id' => 'test_connection',
            'class' => 'compact ui small button',
            'data' => ['url' => 'test-query']
        ]) ?>
</div>