<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $title
 *
 * @property RealEstate[] $realEstates
 * @property Region[] $regions
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
            'title' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealEstates()
    {
        return $this->hasMany(RealEstate::className(), ['countryId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegions()
    {
        return $this->hasMany(Region::className(), ['countryId' => 'id']);
    }
}
