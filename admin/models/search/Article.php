<?php

namespace admin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Article as ArticleModel;

/**
 * Article represents the model behind the search form about `common\models\Article`.
 */
class Article extends ArticleModel
{
    public function rules()
    {
        return [
            [['id', 'categoryId', 'authorId', 'createdBy', 'updatedBy', 'isPublished', 'publishedAt', 'publishedBy', 'isDeleted', 'deletedBy'], 'integer'],
            [['title', 'introText', 'text', 'tags', 'createdAt', 'updaterAt', 'deletedAt'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = ArticleModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'categoryId' => $this->categoryId,
            'authorId' => $this->authorId,
            'createdAt' => $this->createdAt,
            'updaterAt' => $this->updaterAt,
            'createdBy' => $this->createdBy,
            'updatedBy' => $this->updatedBy,
            'isPublished' => $this->isPublished,
            'publishedAt' => $this->publishedAt,
            'publishedBy' => $this->publishedBy,
            'isDeleted' => $this->isDeleted,
            'deletedAt' => $this->deletedAt,
            'deletedBy' => $this->deletedBy,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'introText', $this->introText])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'tags', $this->tags]);

        return $dataProvider;
    }
}
