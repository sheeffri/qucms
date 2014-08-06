<?php

namespace admin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Contractor as ContractorModel;

/**
 * Contractor represents the model behind the search form about `common\models\Contractor`.
 */
class Contractor extends ContractorModel
{
    public function rules()
    {
        return [
            [['id', 'parentContractorId', 'ownerId', 'isVip', 'ownershipId'], 'integer'],
            [['name', 'alterName', 'phone', 'phoneAdd', 'fax', 'skype', 'email', 'site'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = ContractorModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'parentContractorId' => $this->parentContractorId,
            'ownerId' => $this->ownerId,
            'isVip' => $this->isVip,
            'ownershipId' => $this->ownershipId,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'alterName', $this->alterName])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'phoneAdd', $this->phoneAdd])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'skype', $this->skype])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'site', $this->site]);

        return $dataProvider;
    }
}
