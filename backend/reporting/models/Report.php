<?php

namespace crudle\app\reporting\models;

use crudle\app\reporting\models\ReportBuilder;
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
