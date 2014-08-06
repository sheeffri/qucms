<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "real_estate_feature_group".
 *
 * @property integer $id
 * @property string $name
 *
 * @property RealEstateFeature[] $realEstateFeatures
 */
class RealEstateFeatureGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'real_estate_feature_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique']
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealEstateFeatures()
    {
        return $this->hasMany(RealEstateFeature::className(), ['groupId' => 'id']);
    }
}
