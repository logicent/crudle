<?php

namespace crudle\app\report\models;

use crudle\app\main\models\ReportBuilder;
use crudle\app\setup\enums\Type_Permission;

/**
 * This is the model class for page "Report".
 */
class Report extends ReportBuilder
{
    public static function permissions()
    {
        return [
            Type_Permission::List => Type_Permission::List,
        ];
    }
}
