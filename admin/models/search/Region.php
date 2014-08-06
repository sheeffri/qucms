<?php

namespace admin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Region as RegionModel;

/**
 * Region represents the model behind the search form about `common\models\Region`.
 */
class Region extends RegionModel
{
    public function rules()
    {
        return [
            [['id', 'countryId'], 'integer'],
            [['title'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = RegionModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
