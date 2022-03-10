<?php

namespace app\modules\website\models;

use app\modules\website\models\base\BasePersonInfo;

class BlogWriter extends BasePersonInfo
{
    public static function tableName()
    {
        return 'site_post_author';
    }
}
