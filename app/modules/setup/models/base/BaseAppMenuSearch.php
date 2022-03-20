<?php

namespace app\modules\setup\models\base;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class BaseAppMenuSearch extends BaseAppMenu
{    /**
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
       $query = BaseAppMenu::find();

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
           'inactive'   => $this->inactive,
           'group'      => $this->group
       ]);

       $query
           ->andFilterWhere(['like', 'icon', $this->icon])
           ->andFilterWhere(['like', 'icon_path', $this->icon_path])
           ->andFilterWhere(['like', 'icon_color', $this->icon_color])
           ->andFilterWhere(['like', 'route', $this->route])
           ->andFilterWhere(['like', 'label', $this->label]);

       return $dataProvider;
   }
}