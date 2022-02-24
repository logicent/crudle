<?php

use app\models\auth\People;

$model = $this->context->model;

if ( $this->context->action->id != 'create' ) :

?>
    <div id="sidebar">
        <?= $this->render('_sidebar_links') ?>
    </div>
<?php endif ?>
