<?php

?>
<div class="ui attached padded segment">
    <?= $form->field($model, 'custom_js')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'inactive')->checkbox() ?>
</div>
