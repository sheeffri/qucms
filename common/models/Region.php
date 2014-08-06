<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property integer $id
 * @property integer $countryId
 * @property string $title
 *
 * @property City[] $cities
 * @property RealEstate[] $realEstates
 * @property Country $country
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['countryId'], 'required'],
            [['countryId'], 'integer'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'countryId' => 'Country ID',
            'title' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['regionId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealEstates()
    {
        return $this->hasMany(RealEstate::className(), ['regionId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'countryId']);
    }
}
