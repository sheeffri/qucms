<?php

namespace admin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use admin\models\ImageSection as ImageSectionModel;

/**
 * ImageSection represents the model behind the search form about `admin\models\ImageSection`.
 */
class ImageSection extends ImageSectionModel
{
    public function rules()
    {
        return [
            [['id', 'width', 'height', 'cropToMax', 'cropToWidth', 'cropToHeight', 'quality', 'forRetina'], 'integer'],
            [['name', 'path', 'url'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = ImageSectionModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'width' => $this->width,
            'height' => $this->height,
            'cropToMax' => $this->cropToMax,
            'cropToWidth' => $this->cropToWidth,
            'cropToHeight' => $this->cropToHeight,
            'quality' => $this->quality,
            'forRetina' => $this->forRetina,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
