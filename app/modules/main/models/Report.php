<?php

namespace crudle\main\models;

use crudle\setup\enums\Type_Permission;
use crudle\setup\models\ReportBuilder;

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
