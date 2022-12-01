<?php

use crudle\app\helpers\StatusMarker;
use crudle\app\main\enums\Type_View;
use yii\helpers\Html;


$controller = $this->context;

$menuItems = [];
?>

<header class="page-container">
    <nav class="page-head ui attached menu text">
        <div class="ui two column grid container">
            <div class="column item">
                <div class="page-title ui floated header">
                    <?= Html::encode($this->title) ?>
                </div>
            </div>
            <div class="column right aligned">
                <div class="page-actions"><!-- ui spaced buttons -->
            <?php
                // create/update record or settings form view
                if ($controller->mapActionToViewType() == Type_View::Form) :
                    echo $this->render('@appMain/views/_form/action');
                endif;
                // other multiple records view list/tree etc.
                if ($controller->mapActionToViewType() == Type_View::List) :
                    echo $this->render('@appMain/views/list/action');
                endif ?>
                </div>
            </div>
        </div>
    </nav>
</header>