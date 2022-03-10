<?php

namespace app\models\auth;

use app\modules\setup\enums\Type_Role;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PersonSearch represents the model behind the search form about `app\models\auth\Person`.
 */
class PersonSearch extends Person
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_role', 'user_group', 'full_name', 'auth.status',
                'sex', 'title_of_courtesy', 'personal_email', 'mobile_no', 'official_status',
                'status', 'avatar', 'notes', 'comments'], 
            'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['auth.status']);
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
        $query = Person::find();

        if (!Yii::$app->user->can(Type_Role::Administrator))
            $query->where(['not like', 'auth.username', Type_Role::Administrator]);

        $query->joinWith(['auth']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'auth.status' => SORT_DESC,
                    'firstname' => SORT_ASC,
                    'surname' => SORT_ASC,
                ]
            ],
        ]);

        $dataProvider->sort->attributes['full_name'] = [
            'asc' => ['firstname' => SORT_ASC, 'surname' => SORT_ASC],
            'desc' => ['firstname' => SORT_DESC, 'surname' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['auth.status'] = [
            'asc' => ['auth.status' => SORT_ASC],
            'desc' => ['auth.status' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'sex' => $this->sex,
            'status' => $this->status,
            'user_role' => $this->user_role,
            'user_group' => $this->user_group,
            'official_status' => $this->official_status,
            'auth.status' => $this->getAttribute('auth.status'),
        ]);

        $query
            ->andFilterWhere(['like', 'firstname', $this->full_name])
            ->orFilterWhere(['like', 'surname', $this->full_name])
            ->andFilterWhere(['like', 'personal_email', $this->personal_email])
            ->andFilterWhere(['like', 'mobile_no', $this->mobile_no])
            ->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
