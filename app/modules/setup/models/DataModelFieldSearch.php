<?php

namespace crudle\setup\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use crudle\setup\models\DataModelField;

/**
 * DataModelFieldSearch represents the model behind the search form of `app\modules\main\models\DataModelField`.
 */
class DataModelFieldSearch extends DataModelField
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'data_model', 'label', 'type', 'options', 'depends_on', 'mandatory_depends_on', 'readonly_depends_on', 'default', 'description'], 'safe'],
            [['length', 'mandatory', 'unique', 'in_list_view', 'in_standard_filter', 'in_global_search', 'bold', 'allow_in_quick_entry', 'translatable', 'fetch_from', 'fetch_if_empty', 'ignore_user_permissions', 'allow_on_submit', 'report_hide', 'perm_level', 'hidden', 'readonly', 'in_filter', 'print_hide', 'print_width', 'width'], 'integer'],
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
        $query = DataModelField::find();

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
            'length' => $this->length,
            'mandatory' => $this->mandatory,
            'unique' => $this->unique,
            'in_list_view' => $this->in_list_view,
            'in_standard_filter' => $this->in_standard_filter,
            'in_global_search' => $this->in_global_search,
            'bold' => $this->bold,
            'allow_in_quick_entry' => $this->allow_in_quick_entry,
            'translatable' => $this->translatable,
            'fetch_from' => $this->fetch_from,
            'fetch_if_empty' => $this->fetch_if_empty,
            'ignore_user_permissions' => $this->ignore_user_permissions,
            'allow_on_submit' => $this->allow_on_submit,
            'report_hide' => $this->report_hide,
            'perm_level' => $this->perm_level,
            'hidden' => $this->hidden,
            'readonly' => $this->readonly,
            'in_filter' => $this->in_filter,
            'print_hide' => $this->print_hide,
            'print_width' => $this->print_width,
            'width' => $this->width,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'data_model', $this->data_model])
            ->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'options', $this->options])
            ->andFilterWhere(['like', 'depends_on', $this->depends_on])
            ->andFilterWhere(['like', 'mandatory_depends_on', $this->mandatory_depends_on])
            ->andFilterWhere(['like', 'readonly_depends_on', $this->readonly_depends_on])
            ->andFilterWhere(['like', 'default', $this->default])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
