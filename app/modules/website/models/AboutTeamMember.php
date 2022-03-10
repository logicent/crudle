<?php

namespace app\modules\website\models;

use app\modules\website\models\base\BasePersonInfo;

class AboutTeamMember extends BasePersonInfo
{
    public static function tableName()
    {
        return 'site_team_member';
    }
}
