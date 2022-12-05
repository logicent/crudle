<?php

namespace crudle\app\helpers;

use icms\FomanticUI\Elements;

class StatusMarker
{
    public static function icon( $statusIcon, $model, $attribute )
    {
        if ($model->statusEnumsColors($attribute))
        {
            $statusColor = $model->statusEnumsColors($attribute)[ $model->$attribute ];
            return Elements::icon( $statusColor .' small '. $statusIcon );
        }
        // else
        return Elements::icon( ' small '. $statusIcon );
    }

    public static function label( $model, $attribute )
    {
        return $model->statusEnums($attribute)[$model->$attribute];
    }
}
