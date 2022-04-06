<?php

namespace app\modules\main\enums;

use Yii;

class Type_Relation
{
    const ParentModel   = 'Parent';
    const ChildModel    = 'Child';
    const SiblingModel  = 'Sibling';
    const SubModel      = 'Sub'; // In-model child - maps to a separate row
    const InlineModel   = 'Inline'; // In-model child - maps to a column in same row

    public static function enums()
    {
        return [
            self::ParentModel   => Yii::t('app', self::ParentModel),
            self::ChildModel    => Yii::t('app', self::ChildModel),
            self::SiblingModel  => Yii::t('app', self::SiblingModel),
        ];
    }
}