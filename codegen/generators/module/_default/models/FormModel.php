<?php

use yii\helpers\StringHelper;

echo "<?php\n";
?>

namespace crudle\ext\<?= StringHelper::basename($generator->modulePath) ?>\models;

use crudle\app\crud\enums\Type_Relation;
use crudle\app\main\forms\UploadForm;
use crudle\app\setting\models\base\BaseSettingsForm;
use Yii;

class FormModel extends BaseSettingsForm
{
    public function init()
    {
        $this->uploadForm = new UploadForm();
        $this->fileAttribute = 'fileAttribute';
    }

    public function rules()
    {
        return [
        ];
    }

    public function attributeLabels()
    {
        return [
            'attribute' => Yii::t('app', 'Attribute'),
        ];
    }

    public function attributeHints()
    {
        return [
            'attribute' => Yii::t('app', "Attribute"),
        ];
    }

    public static function relations(): array
    {
        return [
            'relationAttribute' => [
                'class' => RelationModel::class,
                'type' => Type_Relation::InlineModel,
            ],
        ];
    }

    public static function hasMixedValueFields(): bool
    {
        return true;
    }

    public static function mixedValueFields(): array
    {
        return [
            // Type_Mixed_Value::JsonFormatted => [
                'mixedAttribute',
            // ]
        ];
    }
}
