<?php

use crudle\app\helpers\StatusMarker;
use yii\helpers\Html;
use yii\helpers\Url;

$url = Url::to([ 'change-status', 'id' => $model->id ]);
$statuses = $model->nextStatus();

if ( empty( $statuses )) :
    echo Html::tag('span', 
            StatusMarker::icon('check circle', $model, 'status') .'&nbsp;'. Yii::t('app', '{statusLabel}', [
                'statusLabel' => StatusMarker::label( $model, 'status' )
            ]), 
            ['class' => 'basic text-muted']);
else :
?>
<div class="compact ui floating dropdown small button" id="status_menu">
    <div class="text" id="status_label">
        <?= StatusMarker::icon('check circle', $model, 'status') .'&nbsp;'. Yii::t('app', '{statusLabel}', [
                'statusLabel' => StatusMarker::label( $model, 'status' )
            ]) ?>
    </div>
    <i class="dropdown icon"></i>
    <div class="menu">
    <?php
        foreach ($statuses as $status) :
            echo Html::a(
                    Yii::t('app', $status), 
                    false, [
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
    </div>
</div>
<?php
    endif;
$this->registerJs(<<<JS
    $('.ui.dropdown').dropdown();
JS)
?>