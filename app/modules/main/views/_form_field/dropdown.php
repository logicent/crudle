<?php

use yii\helpers\Html;

$htmlOptions = $htmlOptions ?? [];
$fieldOptions = $fieldOptions ?? [];

if (isset($form)) :
        $field = $form
                ->field($model, $attribute, $fieldOptions)
                ->dropDownList($list, $htmlOptions);
else :
        $field = Html::activeDropDownList($model, $attribute, $list, $htmlOptions);
endif;

echo $field;
