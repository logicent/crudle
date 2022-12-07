<?php

namespace crudle\app\database\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use crudle\app\database\models\DataModel;

/**
 * DataModelSearch represents the model behind the search form of `app\modules\main\models\DataModel`.
 */
class DataModelSearch extends DataModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'module', 'title_field', 'image_field', 'search_fields', 'sort_field', 'sort_order', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'safe'],
            [['max_attachments', 'hide_copy', 'is_table', 'quick_entry', 'track_changes', 'track_views', 'allow_auto_repeat', 'allow_import'], 'integer'],
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
        $query = DataModel::find();

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
            'max_attachments' => $this->max_attachments,
            'hide_copy' => $this->hide_copy,
            'is_table' => $this->is_table,
            'quick_entry' => $this->quick_entry,
            'track_changes' => $this->track_changes,
            'track_views' => $this->track_views,
            'allow_auto_repeat' => $this->allow_auto_repeat,
            'allow_import' => $this->allow_import,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'module', $this->module])
            ->andFilterWhere(['like', 'title_field', $this->title_field])
            ->andFilterWhere(['like', 'image_field', $this->image_field])
            ->andFilterWhere(['like', 'search_fields', $this->search_fields])
            ->andFilterWhere(['like', 'sort_field', $this->sort_field])
            ->andFilterWhere(['like', 'sort_order', $this->sort_order])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
