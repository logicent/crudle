<?php

use yii\helpers\Html;

$options = $options ?? [];

if (isset($form)) :
        $field = $form
                ->field($model, $attribute)
                ->dropDownList($list, $options);
else :
        $field = Html::activeDropDownList($model, $attribute, $list, $options);
endif;

echo $field;
