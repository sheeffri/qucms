<?php

namespace admin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ArticleCategory as ArticleCategoryModel;

/**
 * ArticleCategory represents the model behind the search form about `common\models\ArticleCategory`.
 */
class ArticleCategory extends ArticleCategoryModel
{
    public function rules()
    {
        return [
            [['id', 'parentId', 'weight', 'parentIdFk'], 'integer'],
            [['name', 'alias'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = ArticleCategoryModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'parentId' => $this->parentId,
            'weight' => $this->weight,
            'parentIdFk' => $this->parentIdFk,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'alias', $this->alias]);

        return $dataProvider;
    }
}
