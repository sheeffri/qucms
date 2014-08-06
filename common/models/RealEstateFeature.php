<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "real_estate_feature".
 *
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property integer $groupId
 *
 * @property RealEstateFeatureGroup $group
 * @property RealEstateObjectFeature $realEstateObjectFeature
 * @property RealEstate[] $realEstates
 */
class RealEstateFeature extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'real_estate_feature';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'groupId'], 'required'],
            [['type'], 'string'],
            [['groupId'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'type' => 'Тип',
            'groupId' => 'Group ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(RealEstateFeatureGroup::className(), ['id' => 'groupId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealEstateObjectFeature()
    {
        return $this->hasOne(RealEstateObjectFeature::className(), ['realEstateFeatureId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealEstates()
    {
        return $this->hasMany(RealEstate::className(), ['id' => 'realEstateId'])->viaTable('real_estate_object_feature', ['realEstateFeatureId' => 'id']);
    }
}
