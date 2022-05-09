<?php

namespace crudle\app\enums;

use crudle\app\setup\enums\Type_Model as Setup_Type_Model;
use website\enums\Type_Model as Website_Type_Model;

class Type_Model
{
    public static function enums()
    {
        return [
        ];
    }

    public static function modelClasses()
    {
        $modelClasses = [];
        // main app
        $modelClasses = array_merge($modelClasses, self::coreModelClass());
        // main module
        $modelClasses = array_merge($modelClasses, Setup_Type_Model::modelClasses());
        // website module
        $modelClasses = array_merge($modelClasses, Website_Type_Model::modelClasses());
        return $modelClasses;
    }

    public static function coreModelClass()
    {
        return [
        ];
    }
}
