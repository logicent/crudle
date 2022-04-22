<?php

use crudle\setup\enums\Type_Permission;
use crudle\main\enums\Resource_Action;
use yii\helpers\Html;
use yii\helpers\Url;
use Zelenin\yii\SemanticUI\helpers\Size;
use Zelenin\yii\SemanticUI\modules\Modal;

?>

<div class="compact ui floating dropdown button" style="padding-right: 8.75px;"><?= Yii::t('app', 'Menu') ?>
    &ensp;<i class="down small chevron icon"></i>
    <div class="menu">
<?php
    if (
        $this->context->action->id == Resource_Action::Read || 
        $this->context->action->id == Resource_Action::Update
    ) :
        if ($model->allowPrint() && $model->userCan(Type_Permission::Print, Yii::$app->user->id)) :
            echo Html::a(Yii::t('app', 'Print'), ['export-pdf', 'id' => $model->id], [
                    'class' => 'item user-action',
                    'data' => ['method' => 'post']
                ]);
        endif;
        if ($model->allowSendEmail() && $model->userCan(Type_Permission::Email, Yii::$app->user->id)) :
            echo Html::a(Yii::t('app', 'Email'), false, [
                'class' => 'item user-action',
                'data' => ['url' => Url::to(['email'])]
            ]);
        endif;
        if ($model->allowDuplicate() && $model->userCan(Type_Permission::Create, Yii::$app->user->id)) :
            echo Html::a(Yii::t('app', 'Duplicate'), ['create', 'id' => $model->id], [
                'class' => 'item user-action',
            ]);
        endif;
        if ($model->userCan(Type_Permission::Create, Yii::$app->user->id)) :
            echo Html::a(Yii::t('app', 'New') .' '. $this->context->viewName(), ["create"], 
                ['class' => 'item']
            );
        endif;
        if (! $model->lockDelete() && $model->userCan(Type_Permission::Delete, Yii::$app->user->id)) :
            echo Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'item user-action',
                'data' => [
                    'confirm' => Yii::t('app', "Confirm to delete {$this->context->viewName()}:"  . $model->id),
                    'method' => 'post'
                ]
            ]);
        endif;
    endif ?>
    </div><!-- ./menu -->
</div>

<?php
$modal = Modal::begin([
    'id' => 'subform_modal',
    'size' => Size::MEDIUM,
    ]);
$modal::end();

// $this->registerJs(<<<JS

// $('.user-action').on('click', function(e) 
// {
//     e.preventDefault();
//     el_id = $(this).attr('id');

//     $.ajax({
//         url: $(this).data('url'),
//         type: 'post',
//         data: {
//             'id': $(this).data('id'),
//         },
//         success: function( response )
//         {
//             if (el_id == 'print' || el_id == 'email')
//             {
//                 $('#subform_modal .content').html( response );
//                 $('#subform_modal').modal({
//                         centered: false,
//                         closable: false,
//                     })
//                     .modal('show');
//             }

//             if (el_id == 'duplicate')
//                 $('#content').html( response );
//         },
//         error: function( jqXhr, textStatus, errorThrown )
//         {
//             console.log( errorThrown );
//         }
//     });
// });
// JS) ?>
