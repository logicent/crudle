<?php

use crudle\app\helpers\SelectableItems;
use icms\FomanticUI\helpers\Size;
use icms\FomanticUI\modules\Modal;
use icms\FomanticUI\modules\Select;

$modal = Modal::begin([
    'id' => 'dropdown_modal',
    'size' => Size::SMALL,
]);
$modal::end();

// $isReadonly = $this->context->isReadonly();

echo $form
        ->field($model, $attribute)
        ->widget(Select::class, [
            'search' => true,
            'items' => SelectableItems::get(
                        $list['modelClass'],
                        $model, [
                            'keyAttribute' => $list['keyAttribute'],
                            'valueAttribute' => $list['valueAttribute'],
                            'filters' => $list['filters']
                        ]),
            // 'disabled' => $isReadonly
        ]);
