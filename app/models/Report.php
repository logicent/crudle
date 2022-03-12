<?php

namespace app\models;

use app\modules\setup\enums\Type_Permission;
use app\modules\setup\models\ReportBuilder;

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
