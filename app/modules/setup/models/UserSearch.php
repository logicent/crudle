<?php

namespace app\modules\setup\models;

use app\models\auth\PersonSearch;
use app\modules\setup\enums\Type_Role;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * UserSearch represents the model behind the search form about `app\models\auth\User`.
 */
class UserSearch extends PersonSearch
{
}
