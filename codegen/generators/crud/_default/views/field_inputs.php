<?php

use crudle\app\helpers\SelectableItems;
use crudle\app\main\enums\Type_Column;
use crudle\app\main\enums\Type_Field_Input;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

$model = new $generator->modelClass;

$formSection = '';

$beginFormSection = 
    Html::beginTag('div', ['class' => 'ui padded segment']) . "\n   " .
    Html::beginTag('div', ['class' => 'ui two column stackable grid']) . "\n      ";

$endFormSection = 
    Html::endTag('div') . "\n" . // ui two column stackable grid
    Html::endTag('div') . "\n"; // ui padded segment

$beginLeftColumn = Html::beginTag('div', ['class' => 'column']) . "\n";
$endLeftColumn = "      " . Html::endTag('div') . "\n      "; // column

$beginRightColumn = Html::beginTag('div', ['class' => 'column']) . "\n";
$endRightColumn = "      " . Html::endTag('div') . "\n   "; // column
$rightColumnFields = '';

$formSection = $beginFormSection . $beginLeftColumn;

$formFields = $generator->getFormFields();
foreach ($formFields as $id => $formFieldConfig) :
    $formField = $formFieldConfig->attributes;

    if ($formField['field_type'] == Type_Field_Input::SectionBreak) :
        $formSection .= $endLeftColumn
                     . $beginRightColumn
                     . $rightColumnFields
                     . $endRightColumn
                     . $endFormSection;
        $rightColumnFields = '';
        $formSection .= $beginFormSection . $beginLeftColumn;
        continue;
    endif;
    if ($formField['field_type'] == Type_Field_Input::ColumnBreak) :
        $formSection .= $endLeftColumn
                     . $beginRightColumn
                     . $rightColumnFields
                     . $endRightColumn;
        $rightColumnFields = '';
        $formSection .= $beginLeftColumn;
        continue;
    endif;

    $form = new ActiveForm();
    $fieldView = "@appMain/views/_form_field";
    $attribute = $formField['field_name'];
    switch ($formField['field_type']) :
        case Type_Field_Input::Code:
            $field = "         <?= \$this->render('{$fieldView}/id', [
                'model' => \$model
                // 'attribute' => '{$attribute}',
            ]) ?>\n";
            break;
        case Type_Field_Input::DateInput:
            $field = "         <?= \$this->render('{$fieldView}/date_input', [
                'model' => \$model,
                'attribute' => '{$attribute}',
                'form' => \$form,
            ]) ?>\n";
            break;
        case Type_Field_Input::DateTimeInput:
            $field = "         <?= \$this->render('{$fieldView}/datetime_input', [
                'model' => \$model,
                'attribute' => '{$attribute}',
                'form' => \$form,
            ]) ?>\n";
            break;
        case Type_Field_Input::Dropdown:
            $field = "         <?= \$this->render('{$fieldView}/dropdown', [
                'model' => \$model,
                'attribute' => '{$attribute}',
                'form' => \$form,
                'list' => '{$formField['list']}'
            ]) ?>\n";
            break;
        case Type_Field_Input::CheckboxList:
            $list = $formField['list'];
            $field = "         <?= \$this->render('{$fieldView}/checkbox_list', [
                'model' => \$model,
                'attribute' => '{$attribute}',
                'form' => \$form,
                'items' => SelectableItems::get(
                    '{$list['modelClass']}',
                    \$form,
                    [
                        'addEmptyFirstItem' => '{$list['addEmptyFirstItem']}',
                        'valueAttribute' => '{$list['valueAttribute']}',
                        'filters' => '{$list['filters']}'
                    ]
                ),
            ]) ?>\n";
            break;
        case Type_Field_Input::Checkbox:
            $field = "         <?= \$this->render('{$fieldView}/checkbox', [
                'model' => \$model,
                'attribute' => '{$attribute}',
            ]) ?>\n";
            break;
        case Type_Field_Input::RadioList:
            $field = "         <?= \$this->render('{$fieldView}/radio_list', [
                'model' => \$model,
                'attribute' => '{$attribute}',
            ]) ?>\n";
            break;
        case Type_Field_Input::Select:
            $field = "         <?= \$this->render('{$fieldView}/select', [
                'model' => \$model,
                'attribute' => '{$attribute}',
            ]) ?>\n";
            break;
        case Type_Field_Input::Textarea:
            $field = "         <?= \$this->render('{$fieldView}/textarea', [
                'model' => \$model,
                'attribute' => '{$attribute}',
                'form' => \$form,
            ]) ?>\n";
            break;
        case Type_Field_Input::TextEditor:
            $field = "         <?= \$this->render('{$fieldView}/rich_text_editor', [
                'model' => \$model,
                'attribute' => '{$attribute}',
            ]) ?>\n";
            break;
        case Type_Field_Input::FileInput:
            $field = "         <?= \$this->render('{$fieldView}/file_input', [
                'model' => \$model,
                'attribute' => '{$attribute}',
            ]) ?>\n";
            break;
        case Type_Field_Input::ReadOnly:
            $field = "         <?= \$form->field(\$model, '{$attribute}')->textInput(['readonly' => true]) ?>\n";
            break;
        case Type_Field_Input::TextInput:
        default:
            $field = "         <?= \$form->field(\$model, '{$attribute}') ?>\n";
    endswitch;

    if (isset($formField['column']) && $formField['column'] == Type_Column::Right) :
        $rightColumnFields .= $field;
    else :
        $formSection .= $field;
    endif;
endforeach;

$formSection .= $endLeftColumn
             . $beginRightColumn
             . $rightColumnFields
             . $endRightColumn
             . $endFormSection;

// echo "<?php \n\n";

echo $formSection;