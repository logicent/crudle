<?php

namespace crudle\app\main\models;

use crudle\app\setup\enums\Type_Permission;
use crudle\app\setup\models\ReportBuilder;

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
