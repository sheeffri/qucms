<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property integer $regionId
 * @property string $title
 *
 * @property Region $region
 * @property RealEstate[] $realEstates
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['regionId'], 'required'],
            [['regionId'], 'integer'],
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
            'regionId' => 'Region ID',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'regionId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealEstates()
    {
        return $this->hasMany(RealEstate::className(), ['cityId' => 'id']);
    }
}
