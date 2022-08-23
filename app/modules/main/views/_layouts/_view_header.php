<?php

use crudle\app\assets\Dirrty;
use crudle\app\helpers\StatusMarker;
use crudle\app\main\enums\Type_View;
use yii\helpers\Html;


$controller = $this->context;

if ($controller->layout !== 'print') :
    Dirrty::register($this);
endif;
?>

<div id="page_head" class="ui attached menu text">
    <div class="ui grid container">
        <div class="ten wide column view-header">
            <div class="ui floated header">
                <?= Html::encode($this->title) ?>
                <?php
                    if ($controller->action->id == 'read' ||
                        $controller->action->id == 'update') :
                        $model = $this->context->getModel();
                        $status = $model->getStatusAttribute();
                        echo Html::tag('small',
                            StatusMarker::icon('check circle', $model, $status) . StatusMarker::label($model, $status), [
                                'style' => 'font-weight: 400; margin-left: 0.75em;',
                            ]);
                    endif ?>
            </div>
        </div>
        <div class="six wide column right aligned">
        <?php
            if ($controller->mapActionViewType() == Type_View::Form && !$controller->isReadonly()) :
                // new or update record and settings form view
                echo $this->render('@appMain/views/_form/_view_header');
            elseif ($controller->mapActionViewType() == Type_View::List) :
            // all multiple record views like list view
                if ($controller->showViewTypeSwitcher())
                    echo $this->render('_view_type');
                echo $this->render('@appMain/views/list/_view_header');
            endif ?>
        </div>
    </div>
</div>
