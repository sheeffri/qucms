<?php

namespace admin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RealEstateCategory as RealEstateCategoryModel;

/**
 * RealEstateCategory represents the model behind the search form about `common\models\RealEstateCategory`.
 */
class RealEstateCategory extends RealEstateCategoryModel
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
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
        $query = RealEstateCategoryModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
