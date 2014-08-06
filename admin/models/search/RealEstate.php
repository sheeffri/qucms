<?php

namespace admin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RealEstate as RealEstateModel;

/**
 * RealEstate represents the model behind the search form about `common\models\RealEstate`.
 */
class RealEstate extends RealEstateModel
{
    public function rules()
    {
        return [
            [['id', 'targetId', 'categoryId', 'subCategoryId', 'createdBy', 'ownerId', 'contractorId', 'contactId', 'roomCount', 'floor', 'floors', 'updatedBy', 'price', 'priceHidden', 'auction', 'isRented', 'isDeleted', 'toSite', 'forExport', 'countryId', 'regionId', 'cityId', 'buildMaterialId', 'apartmentLayoutId', 'conditionId', 'bathroomCount', 'yearBuild'], 'integer'],
            [['squareAll', 'squareLiving', 'squareKitchen', 'squareBalcony', 'squareBathroom', 'lat', 'lng', 'ceilingHeight'], 'number'],
            [['createdAt', 'updatedAt', 'status', 'dateSale', 'address', 'description', 'descriptionForSite', 'descriptionNear', 'rentedWith', 'rentedTo'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = RealEstateModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'targetId' => $this->targetId,
            'categoryId' => $this->categoryId,
            'subCategoryId' => $this->subCategoryId,
            'createdBy' => $this->createdBy,
            'ownerId' => $this->ownerId,
            'contractorId' => $this->contractorId,
            'contactId' => $this->contactId,
            'roomCount' => $this->roomCount,
            'floor' => $this->floor,
            'floors' => $this->floors,
            'squareAll' => $this->squareAll,
            'squareLiving' => $this->squareLiving,
            'squareKitchen' => $this->squareKitchen,
            'squareBalcony' => $this->squareBalcony,
            'squareBathroom' => $this->squareBathroom,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'updatedBy' => $this->updatedBy,
            'dateSale' => $this->dateSale,
            'price' => $this->price,
            'priceHidden' => $this->priceHidden,
            'auction' => $this->auction,
            'isRented' => $this->isRented,
            'isDeleted' => $this->isDeleted,
            'toSite' => $this->toSite,
            'forExport' => $this->forExport,
            'countryId' => $this->countryId,
            'regionId' => $this->regionId,
            'cityId' => $this->cityId,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'buildMaterialId' => $this->buildMaterialId,
            'apartmentLayoutId' => $this->apartmentLayoutId,
            'conditionId' => $this->conditionId,
            'bathroomCount' => $this->bathroomCount,
            'ceilingHeight' => $this->ceilingHeight,
            'yearBuild' => $this->yearBuild,
            'rentedWith' => $this->rentedWith,
            'rentedTo' => $this->rentedTo,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'descriptionForSite', $this->descriptionForSite])
            ->andFilterWhere(['like', 'descriptionNear', $this->descriptionNear]);

        return $dataProvider;
    }
}
