<?php

use crudle\app\helpers\DateTimeHelper;
use icms\FomanticUI\Elements;
use yii\helpers\Html;

return [
    // 'attribute' => 'updated_at',
    // 'label' => Yii::t('app', 'Last Updated'),
    'format' => 'raw',
    'header' => $dataProvider->getCount() . ' of ' . $dataProvider->getTotalCount(),
    'headerOptions' => ['class' => 'text-muted right aligned'],
    // 'filter' => false,
    'contentOptions' => [
        'class' => 'right aligned text-muted'
    ],
    'value' => function ($model) {
        if ($model->commentsCount > 0) :
            $comment = 'comments';
        else :
            $comment = 'comments outline';
        endif;
        return
            Html::tag('span',
                DateTimeHelper::getShortRelativeTime( $model->updated_at ) . '&ensp;' .
                Elements::icon($comment, ['grey']) . '&nbsp;' .
                $model->commentsCount,
                ['class' => 'text-muted']
            );
    }
];