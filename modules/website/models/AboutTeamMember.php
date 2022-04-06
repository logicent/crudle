<?php

namespace website\models;

use website\models\base\BasePersonInfo;

class AboutTeamMember extends BasePersonInfo
{
    public static function tableName()
    {
        return 'site_team_member';
    }
}
