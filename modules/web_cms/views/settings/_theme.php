<?php

use icms\FomanticUI\modules\Select;
?>
<div class="ui two column grid">
    <div class="column">
        <?= $form->field($model, 'theme')->widget(Select::class, [
                'items' => [],
                'search' => true,
            ]) ?>
    </div>
</div>
