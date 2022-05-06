<?php

use crudle\app\assets\DirrtyAsset;
use crudle\app\helpers\StatusMarker;
use crudle\app\main\enums\Resource_Action;
use crudle\app\main\enums\Type_View;
use crudle\app\main\models\base\BaseActiveRecord;
use crudle\app\setup\enums\Status_Transaction;
use crudle\app\setup\enums\Type_Permission;
use yii\helpers\Html;
use yii\helpers\Url;
use Zelenin\yii\SemanticUI\Elements;


$controller = $this->context;

if ($controller->layout !== 'print') :
    DirrtyAsset::register($this);
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
            // all multiple record views like list and image view
            if ($controller->defaultViewType() == Type_View::List) :
                if ($controller->showViewTypeSwitcher())
                    echo $this->render('_view_type');
                echo $this->render('@app_main/views/list/_view_header');
            endif;
            // form view i.e. new or update record and setting form
            if ($controller->defaultViewType() == Type_View::Form) :
                echo $this->render('@app_main/views/_form/_view_header');
            endif ?>
        </div>
    </div>
</div>
