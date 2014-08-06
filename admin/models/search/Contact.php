<?php

namespace admin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Contact as ContactModel;

/**
 * Contact represents the model behind the search form about `common\models\Contact`.
 */
class Contact extends ContactModel
{
    public function rules()
    {
        return [
            [['id', 'sex', 'countryId', 'stateId', 'cityId', 'useEmail', 'usePhone', 'usePost', 'useSms'], 'integer'],
            [['fio', 'type', 'birthDay', 'workPhone', 'mobilePhone', 'homePhone', 'skype', 'email', 'postIndex', 'address', 'lat', 'lng'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = ContactModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'birthDay' => $this->birthDay,
            'sex' => $this->sex,
            'countryId' => $this->countryId,
            'stateId' => $this->stateId,
            'cityId' => $this->cityId,
            'useEmail' => $this->useEmail,
            'usePhone' => $this->usePhone,
            'usePost' => $this->usePost,
            'useSms' => $this->useSms,
        ]);

        $query->andFilterWhere(['like', 'fio', $this->fio])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'workPhone', $this->workPhone])
            ->andFilterWhere(['like', 'mobilePhone', $this->mobilePhone])
            ->andFilterWhere(['like', 'homePhone', $this->homePhone])
            ->andFilterWhere(['like', 'skype', $this->skype])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'postIndex', $this->postIndex])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'lng', $this->lng]);

        return $dataProvider;
    }
}
