<?php

namespace crudle\ext\report\models;

use crudle\ext\report\models\ReportBuilder;
use crudle\app\user\enums\Type_Permission;

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
