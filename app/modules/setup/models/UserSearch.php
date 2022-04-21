<?php

namespace crudle\setup\models;

use crudle\main\models\auth\PersonSearch;
use crudle\setup\enums\Type_Role;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * UserSearch represents the model behind the search form about `app\modules\main\models\auth\User`.
 */
class UserSearch extends PersonSearch
{
}
