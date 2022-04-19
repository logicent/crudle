<?php

namespace crudle\main\models\auth;

use app\enums\Type_Role;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PeopleSearch represents the model behind the search form about `app\modules\main\models\auth\People`.
 */
class PeopleSearch extends People
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[  'id', 'username', 'email', 'status', 'created_at', 'updated_at', 'id',
                'title_of_courtesy', 'firstname', 'surname', 'sex',
                'personal_email', 'mobile_no', 'official_status', 'avatar', 'notes',
                'user_role', 'user_group', 'comments'
            ], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = People::find();

        if ( !Yii::$app->user->can( Type_Role::Administrator ))
            $query->where(['not like', 'username', Type_Role::Administrator ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'status' => SORT_DESC,
                    'firstname' => SORT_ASC,
                    'surname' => SORT_ASC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'sex' => $this->sex,
            'id' => $this->id,
            'user_role' => $this->user_role,
            'user_group' => $this->user_group,
            'official_status' => $this->official_status,
            'status' => $this->status,
        ]);

        $query
            ->andFilterWhere(['like', 'firstname', $this->firstname])
            ->orFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'personal_email', $this->personal_email])
            ->andFilterWhere(['like', 'mobile_no', $this->mobile_no])
            ->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
