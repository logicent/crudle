<?php

namespace app\modules\setup\models;

use app\enums\Type_Role;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RoleSearch represents the model behind the search form of `app\modules\setup\models\Role`.
 */
class RoleSearch extends Role
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
        ];
    }

    /**
     * {@inheritdoc}
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
        $roles_filter = '';
        if (!Yii::$app->user->can(Type_Role::SystemManager) &&
            !Yii::$app->user->can(Type_Role::Administrator))
            $roles_filter = ['not in', 'name', [
                Type_Role::Administrator,
                Type_Role::SystemManager
            ]];

        if (Yii::$app->user->can(Type_Role::SystemManager))
            $roles_filter = ['not in', 'name', [Type_Role::Administrator]];

        $query = Role::find()->where(['type' => Role::TYPE_ROLE])
                            ->andWhere($roles_filter);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'type' => $this->type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'rule_name', $this->rule_name])
            ->andFilterWhere(['like', 'data', $this->data])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
