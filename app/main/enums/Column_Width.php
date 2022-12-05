<?php

namespace crudle\app\main\enums;

use Yii;

class Column_Width
{
    const One   = 'one';
    const Two   = 'two';
    const Three = 'three';
    const Four  = 'four';
    const Five  = 'five';
    const Six   = 'six';
    const Seven = 'seven';
    const Eight = 'eight';
    const Nine  = 'nine';
    const Ten   = 'ten';
    const Eleven = 'eleven';
    const Twelve = 'twelve';
    const Thirteen = 'thirteen';
    const Fourteen = 'fourteen';
    const Fifteen = 'fifteen';
    const Sixteen = 'sixteen';

    public static function enums()
    {
        return [
            self::One => Yii::t('app', 'One'),
            self::Two => Yii::t('app', 'Two'),
            self::Three => Yii::t('app', 'Three'),
            self::Four => Yii::t('app', 'Four') .' '. Yii::t('app', '(One quarter)'),
            self::Five => Yii::t('app', 'Five'),
            self::Six => Yii::t('app', 'Six'),
            self::Seven => Yii::t('app', 'Seven'),
            self::Eight => Yii::t('app', 'Eight') .' '. Yii::t('app', '(One half)'),
            self::Nine => Yii::t('app', 'Nine'),
            self::Ten => Yii::t('app', 'Ten'),
            self::Eleven => Yii::t('app', 'Eleven'),
            self::Twelve => Yii::t('app', 'Twelve') .' '. Yii::t('app', '(Three quarters)'),
            self::Thirteen => Yii::t('app', 'Thirteen'),
            self::Fourteen => Yii::t('app', 'Fourteen'),
            self::Fifteen => Yii::t('app', 'Fifteen'),
            self::Sixteen => Yii::t('app', 'Sixteen') .' '. Yii::t('app', '(Full width)'),
        ];
    }
}