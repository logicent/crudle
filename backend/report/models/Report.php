<?php

namespace crudle\app\report\models;

use crudle\app\report\models\ReportQuery;
use crudle\app\user\enums\Type_Permission;

/**
 * This is the model class for page "Report".
 */
class Report extends ReportQuery
{
    public static function permissions()
    {
        return [
            Type_Permission::List => Type_Permission::List,
        ];
    }
}
