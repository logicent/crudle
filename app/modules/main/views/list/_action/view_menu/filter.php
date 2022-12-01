<?php

use icms\FomanticUI\Elements;

echo Elements::button(Yii::t('app', 'Show filters'), [ // zoom, Elements::icon('toggle off')
        'id' => 'show_filters',
        'class' => 'compact filter',
    ]);
echo Elements::button(Yii::t('app', 'Hide filters'), [ // zoom out, Elements::icon('toggle on')
        'id' => 'hide_filters',
        'class' => 'compact filter',
        'style' => 'display: none'
    ]);