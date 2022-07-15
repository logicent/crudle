<?php

use crudle\app\helpers\SelectableItems;
use crudle\app\main\enums\Type_Column;
use crudle\app\main\enums\Type_Field_Input;
use yii\helpers\Html;


$formSection = '';

$beginFormSection = 
    Html::beginTag('div', ['class' => 'ui padded segment']) .
    Html::beginTag('div', ['class' => 'ui two column stackable grid']);

$endFormSection = 
    Html::endTag('div') . // ui two column stackable grid
    Html::endTag('div'); // ui padded segment

$beginLeftColumn = Html::beginTag('div', ['class' => 'column']);
$endLeftColumn = Html::endTag('div'); // column

$beginRightColumn = Html::beginTag('div', ['class' => 'column']);
$endRightColumn = Html::endTag('div'); // column
$rightColumnFields = '';

$formSection = $beginFormSection . $beginLeftColumn;

$fieldInputs = $model->fieldInputs();
foreach ($fieldInputs as $attribute => $fieldInput) :
    if ($fieldInput['type'] == Type_Field_Input::SectionBreak) :
        $formSection .= $endLeftColumn .
                        $beginRightColumn .
                        $rightColumnFields .
                        $endRightColumn .
                        $endFormSection;
        $rightColumnFields = '';
        $formSection .= $beginFormSection . $beginLeftColumn;
        continue;
    endif;
    if ($fieldInput['type'] == Type_Field_Input::ColumnBreak) :
        $formSection .= $endLeftColumn .
                        $beginRightColumn .
                        $rightColumnFields .
                        $endRightColumn;
        $rightColumnFields = '';
        $formSection .= $beginLeftColumn;
        continue;
    endif;

    switch ($fieldInput['type']) :
        case Type_Field_Input::Code:
            $field = $this->render('@appMain/views/_form_field/id', [
                        'model' => $model
                    ]);
            break;
        case Type_Field_Input::DateInput:
            $field = $this->render('@appMain/views/_form_field/date_input', [
                        'model' => $model,
                        'attribute' => $attribute,
                        'form' => $form,
                    ]);
            break;
        case Type_Field_Input::DateTimeInput:
            $field = $this->render('@appMain/views/_form_field/datetime_input', [
                        'model' => $model,
                        'attribute' => $attribute,
                        'form' => $form,
                    ]);
            break;
        case Type_Field_Input::Checkbox:
            $field = $this->render('@appMain/views/_form_field/checkbox', [
                        'model' => $model,
                        'attribute' => $attribute,
                    ]);
            break;
        case Type_Field_Input::CheckboxList:
            $field = $this->render('@appMain/views/_form_field/checkbox_list', [
                        'model' => $model,
                        'form' => $form,
                        'items' => SelectableItems::get(
                            $fieldInput['list']['modelClass'],
                            $form,
                            [
                                'addEmptyFirstItem' => $fieldInput['list']['addEmptyFirstItem'],
                                'valueAttribute' => $fieldInput['list']['valueAttribute'],
                                'filters' => $fieldInput['list']['filters']
                            ]
                        ),
                        'attribute' => $attribute,
                    ]);
            break;
        case Type_Field_Input::RadioList:
            $field = $this->render('@appMain/views/_form_field/radio_list', [
                        'model' => $model,
                        'attribute' => $attribute,
                    ]);
            break;
        case Type_Field_Input::Select:
            $field = $this->render('@appMain/views/_form_field/select', [
                        'model' => $model,
                        'attribute' => $attribute,
                    ]);
            break;
        case Type_Field_Input::Dropdown:
            $field = $this->render('@appMain/views/_form_field/dropdown', [
                        'model' => $model,
                        'attribute' => $attribute,
                        'form' => $form,
                        'list' => $fieldInput['list']
                    ]);
            break;
        case Type_Field_Input::SmallText:
            $field = $this->render('@appMain/views/_form_field/textarea', [
                        'model' => $model,
                        'attribute' => $attribute,
                    ]);
            break;
        case Type_Field_Input::LargeText:
            $field = $this->render('@appMain/views/_form_field/textarea', [
                        'model' => $model,
                        'attribute' => $attribute,
                    ]);
            break;
        case Type_Field_Input::TextEditor:
            $field = $this->render('@appMain/views/_form_field/rich_text_editor', [
                        'model' => $model,
                        'attribute' => $attribute,
                    ]);
            break;
        case Type_Field_Input::FileInput:
            $field = $this->render('@appMain/views/_form_field/file_input', [
                        'model' => $model,
                        'attribute' => $attribute,
                    ]);
            break;
        case Type_Field_Input::ReadOnly:
            $field = $form->field($model, $attribute)->textInput(['readonly' => true]);
            break;
        case Type_Field_Input::TextInput:
        default:
            $field = $form->field($model, $attribute);
    endswitch;

    if (isset($fieldInput['column']) && $fieldInput['column'] == Type_Column::Right) :
        $rightColumnFields .= $field;
    else :
        $formSection .= $field;
    endif;
endforeach;

$formSection .= $endLeftColumn .
                $beginRightColumn .
                $rightColumnFields .
                $endRightColumn .
                $endFormSection;

echo $formSection;
?>