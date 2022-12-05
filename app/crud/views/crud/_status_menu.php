<?php

use crudle\app\setup\enums\Type_Permission;
use crudle\app\setup\enums\Type_Role;
use crudle\app\helpers\StatusMarker;
use yii\helpers\Html;
use yii\helpers\Url;
use icms\FomanticUI\helpers\Size;
use icms\FomanticUI\modules\Modal;

$url = Url::to([ 'change-status', 'id' => $model->id ]);

if ((! $model->lockUpdate() && $model->userCan( Type_Permission::Update, Yii::$app->user->id )) ||
    Yii::$app->user->can( Type_Role::SystemManager )
) :
    $statuses = $model->nextStatus();
    if ( empty( $statuses )) :
        echo Html::tag('span', 
                StatusMarker::icon('check circle', $model, 'status') 
                    .'&nbsp;'. Yii::t('app', '{statusLabel}', ['statusLabel' => StatusMarker::label( $model, 'status' )]), 
                ['class' => 'basic text-muted']);
    else :
?>
    <div class="compact ui floating dropdown button" id="status_menu">
        <div class="text" id="status_label">
            <?= StatusMarker::icon('check circle', $model, 'status')
                    . Yii::t('app', '{statusLabel}', ['statusLabel' => StatusMarker::label( $model, 'status' )]
                ) ?>
        </div>
        <i class="dropdown icon"></i>
        <div class="menu">
        <?php
            foreach ($statuses as $status) :
                echo Html::a(
                    Yii::t('app', $status),
                    false,
                    [
                        'class' => 'item app-menu-item status-link',
                        'data' => [
                            'url' => $url,
                            'new-status' => $status,
                            'require-comment' => $model->requireCommentIf( $status ),
                            'show-comment-modal' => Url::to(['show-comment-modal'])
                        ]
                    ]
                );
            endforeach ?>
        </div><!-- ./menu -->
    </div>
<?php
    endif;
else :
    echo StatusMarker::icon('check circle', $model, 'status') .'&nbsp;'. Yii::t('app', '{statusLabel}', ['statusLabel' => StatusMarker::label( $model, 'status' )]);
endif;

$modal = Modal::begin([
    'id' => 'comment_modal',
    'size' => Size::MEDIUM,
]);
$modal::end();

$this->registerJs(<<<JS

$('.status-link').on('click', function(e) 
{
    e.preventDefault();

    newStatus = $(this).data('new-status');
    currentStatus = $('#status_label').html();
    requireComment = $(this).data('require-comment');

    if (Boolean(requireComment) === true )
    {
        $.ajax({
            url: $(this).data('show-comment-modal'),
            type: 'get',
            data: {
                'url': $(this).data('url'),
                'new_status': $(this).data('new-status'),
                'require_comment': $(this).data('require-comment')
            },
            success: function( response )
            {
                $('#comment_modal .content').html( response );
                $('#comment_modal').modal({ 
                    centered: false,
                    closable: false,
                }).modal('show');
            },
            error: function( jqXhr, textStatus, errorThrown )
            {
                console.log( errorThrown );
            }
        });        
        return false;
    }
    // else proceed without a comment
    $.ajax({
        url: $(this).data('url'),
        type: 'post',
        data: {
            'new_status': $(this).data('new-status'),
        },
        success: function( response )
        {
            if (response['failed'])
            {
                $('#status_label').html( currentStatus );
            }
            else {
                // TODO: also show flash message to user - how ?
                $('#content').html( response );
            }
        },
        error: function( jqXhr, textStatus, errorThrown )
        {
            console.log( errorThrown );
        }
    });
});
JS) ?>
