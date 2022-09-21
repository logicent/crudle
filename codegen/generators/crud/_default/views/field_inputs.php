<?php

use crudle\app\helpers\App;
use crudle\app\main\enums\Type_Column;
use crudle\app\main\enums\Type_Field_Input;
use yii\helpers\Html;
use yii\helpers\Inflector;
use icms\FomanticUI\widgets\ActiveForm;

$model = new $generator->modelClass;

$formSection = '';

$beginFormSection = 
    // Html::beginTag('div', ['class' => "ui padded \$disabledClass segment"]) . "\n   " .
    '<div class="ui padded <?= $disabledClass ?> segment">' . "\n   " .
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
    $moduleId = Inflector::underscore(
        Inflector::id2camel(App::getModuleOf($formField['options']))
    );
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
            $options = explode(',', $formField['options']);
            $options = implode(',', $options);
            $field = "         <?= \$this->render('{$fieldView}/dropdown', [
                'model' => \$model,
                'attribute' => '{$attribute}',
                'form' => \$form,
                'list' => ['{$options}'],
                'options' => []
            ]) ?>\n";
            break;
        case Type_Field_Input::Select:
            if (!$formField['options']) {
                $field = "         <?= \$form->field(\$model, '{$attribute}')->dropDownList([]) ?>\n";
                break;
            }
            $modelClass = "crudle\\ext\\{$moduleId}\\models\\{$formField['options']}";
            $fieldType = 'select';
            $field = "         <?= \$this->render('{$fieldView}/{$fieldType}', [
                'model' => \$model,
                'attribute' => '{$attribute}',
                'form' => \$form,
                'list' => [
                    'modelClass' => '{$modelClass}',
                    'addEmptyFirstItem' => true,
                    'keyAttribute' => 'id',
                    'valueAttribute' => 'id',
                    'filters' => [],
                ],
            ]) ?>\n";
            break;
        case Type_Field_Input::CheckboxList:
            $fieldType = 'checkbox_list';
            // $list = $formField['list'];
            $field = "         <?= \$this->render('{$fieldView}/{$fieldType}', [
                'model' => \$model,
                'attribute' => '{$attribute}',
                'form' => \$form,
                'list' => [
                    'modelClass' => 'crudle\\ext\\{$moduleId}\\models\\{$formField['options']}',
                    'addEmptyFirstItem' => true,
                    'keyAttribute' => 'id',
                    'valueAttribute' => 'id',
                    'filters' => [],
                ],
            ]) ?>\n";
            break;
        case Type_Field_Input::Checkbox:
            $field = "         <?= \$form->field(\$model, '{$attribute}')->checkbox()->label('&nbsp;') ?>\n";
            break;
            // To-Do: revisit this later
            $field = "         <?= \$this->render('{$fieldView}/checkbox', [
                'model' => \$model,
                'attribute' => '{$attribute}',
                'form' => \$form,
            ]) ?>\n";
        case Type_Field_Input::RadioList:
            // $itemOptions = explode($formField['options'], '');
            // $itemOptions = is_string($itemOptions) ? [$formField['options']] : $itemOptions;
            $field = "         <?= \$this->render('{$fieldView}/radio_list', [
                'model' => \$model,
                'attribute' => '{$attribute}',
                'form' => \$form,
                'items' => [
                    '{$formField['options']}'
                ],
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
            $length = !empty($formField['length']) ? $formField['length'] : 140;
            $field = "         <?= \$form->field(\$model, '{$attribute}')->textInput(['maxlength' => {$length}]) ?>\n";
    endswitch;

    if ($id % 2 !== 0 || $formField['col_side'] == Type_Column::Right) :
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

echo "<?php \n\n";
?>
$disabledClass = $this->context->isReadonly() ? 'disabled' : null; ?>
<?php
echo "\n" . $formSection;
