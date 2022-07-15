<div class="ui padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <!-- import field inputs -->
            <?= $this->render('_import_data', ['model' => $this->context->model]) ?>
        </div>
        <!-- <div class="ui vertical divider">or</div> -->
        <div class="column">
            <!-- export field inputs -->
            <?= $this->render('_export_template', ['model' => $this->context->model]) ?>
        </div>
    </div>
</div>
<?php
if (!empty($import_errors)) :
    echo $this->render('_log');
endif ?>
