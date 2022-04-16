<?php

namespace app\modules\main\enums;

// Page
// use app\modules\main\models\Help;
use app\modules\main\models\Report;
use app\modules\main\models\auth\People;

use app\modules\setup\enums\Type_Model as Setup_Type_Model;
use website\enums\Type_Model as Website_Type_Model;

class Type_Model
{
    // Page (non-CRUD) models
    // const Help                  = 'Help';
    const People                = 'People';
    // const Dashboard             = 'Dashboard';
    const Report                = 'Report';

    public static function enums()
    {
        return [
        ];
    }

    public static function modelClasses()
    {
        return [
            // self::Dashboard         => Dashboard::class,
        ];
    }
}
