<?php

use crudle\app\helpers\App;
use crudle\app\main\enums\Type_Column;
use crudle\app\main\enums\Type_Field_Input;
use yii\helpers\Html;
use yii\helpers\Inflector;
use icms\FomanticUI\widgets\ActiveForm;

$model = new $generator->modelClass;

$beginFormSection = <<<HTML
    <div class="ui <?= \$disabledClass ?> segments">
    HTML . "\n   ";
$beginSectionBody = 
    Html::beginTag('div', ['class' => 'ui padded segment']) . "\n      " . 
    Html::beginTag('div', ['class' => 'ui two column stackable grid']) . "\n      ";
$endSectionBody = 
    Html::endTag('div') . "\n" . // ui two column stackable grid
    Html::endTag('div') . "\n"; // ui padded segment
$endFormSection = Html::endTag('div') . "\n"; // ui segments

$beginLeftColumn = Html::beginTag('div', ['class' => 'column']) . "\n";
$endLeftColumn = "      " . Html::endTag('div') . "\n      "; // column

$beginRightColumn = Html::beginTag('div', ['class' => 'column']) . "\n";
$endRightColumn = "      " . Html::endTag('div') . "\n   "; // column
$rightColumnFields = '';

$formSection = $beginFormSection . $beginSectionBody . $beginLeftColumn;

$formFields = $generator->getFormFields();
foreach ($formFields as $id => $formFieldConfig) :
    $formField = $formFieldConfig->attributes;
    $moduleId = Inflector::underscore(Inflector::id2camel(App::getModuleOf($formField['options'])));
    $fieldView = "@appMain/views/_form_field";
    $attribute = $formField['field_name'];
    $form = new ActiveForm();
    switch ($formField['field_type']) :
        case Type_Field_Input::SectionBreak :
            $formSection .= $endLeftColumn
                        . $beginRightColumn
                        . $rightColumnFields
                        . $endRightColumn
                        . $endSectionBody
                        . $endFormSection;
            $rightColumnFields = ''; // clear the right column fields
            $formSection .= $beginFormSection;
            if (!empty($formField['label'])) :
                $sectionHead = <<<HTML
                    <div class="ui padded segment" style="padding-bottom: 0.5em">
                        <div class="ui small header">{$formField['label']}</div>
                    </div>
                    HTML . "\n   ";
                $formSection .= $sectionHead;
            endif;
            $formSection .= $beginSectionBody . $beginLeftColumn;
            continue 2;
        break;
        case Type_Field_Input::ColumnBreak :
            $formSection .= $endLeftColumn
                        . $beginRightColumn
                        . $rightColumnFields
                        . $endRightColumn;
            $rightColumnFields = ''; // clear the right column fields
            $formSection .= $beginLeftColumn;
            continue 2;
        break;
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
            . $endSectionBody
            . $endFormSection;

echo "<?php \n\n";
?>
$disabledClass = $this->context->isReadonly() ? 'disabled' : null; ?>
<?php
echo "\n" . $formSection;