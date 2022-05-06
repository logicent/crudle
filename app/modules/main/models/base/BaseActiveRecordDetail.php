<?php

namespace crudle\app\main\models\base;

use yii\db\ActiveRecord;
use yii\helpers\Json;

/**
 * This is the base model class for all other ActiveRecord models.
 */
abstract class BaseActiveRecordDetail extends ActiveRecord
{
    public $listSettings;
    // public $uploadForm, $fileAttribute = null;
    private $_changedValues;

    public function beforeSave( $insert )
    {
        if (! parent::beforeSave( $insert ))
            return false;
        // generate random Id for child tables only accessed via parent in views
        if ( $this->isNewRecord && empty( $this->id ))
            $this->id = uniqid();

        return true;
    }

    public function valuesChanged()
    {
        $countChangedValues = 0;
        // compare old and new attribute values
        foreach ($this->oldAttributes as $name => $oldValue) {
            $newValue = $this->$name;
            if ($name == 'comments') // skip for now until json format support is done
            {
                $newValue = Json::encode($newValue);
                if ($newValue == $oldValue)
                    continue;
                $this->_changedValues .= $this->getAttributeLabel($name) . ' from ' . $oldValue . ' to ' . $newValue . ', ';
                $countChangedValues += 1;
                continue;
            }
            if (is_object($newValue)) // avoid updated_at is yii\db\Expression object
                continue;
            if (in_array($name, $this::mixedValueFields()))
                if (!empty($newValue) && is_array($newValue)) // check the current values $this
                    if ($oldValue == implode(',', $newValue)) // TODO: add json format values support
                        continue;
            if ($newValue == $oldValue)
                continue;
            // else
            $this->_changedValues .= $this->getAttributeLabel($name) . ' from ' . $oldValue . ' to ' . $newValue . ', ';
            $countChangedValues += 1;
        }

        return $countChangedValues > 0;
    }

    public function getChangedValues()
    {
        return $this->_changedValues;
    }

    public static function mixedValueFields()
    {
        return [];
    }
}
