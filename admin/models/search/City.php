<?php

namespace admin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\City as CityModel;

/**
 * City represents the model behind the search form about `common\models\City`.
 */
class City extends CityModel
{
    public function rules()
    {
        return [
            [['id', 'regionId'], 'integer'],
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
        $query = CityModel::find();

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
