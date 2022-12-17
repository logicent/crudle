<?php

use icms\FomanticUI\Elements;
use yii\helpers\Url;

echo Elements::button(Elements::icon('refresh'), [
        'id' => 'refresh_btn',
        'class' => 'compact ui basic icon button',
        'data' => [
            'url' => Url::to(['refresh']),
        ]
    ]);