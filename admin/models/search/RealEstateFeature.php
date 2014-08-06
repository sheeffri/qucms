<?php

namespace admin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RealEstateFeature as RealEstateFeatureModel;

/**
 * RealEstateFeature represents the model behind the search form about `common\models\RealEstateFeature`.
 */
class RealEstateFeature extends RealEstateFeatureModel
{
    public function rules()
    {
        return [
            [['id', 'groupId'], 'integer'],
            [['name', 'type'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = RealEstateFeatureModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
