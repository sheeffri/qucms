<?php

namespace common\models;

use siasoft\qucms\web\IModel;
use Yii;

/**
 * This is the model class for table "real_estate_category".
 *
 * @property integer $id
 * @property string $title
 *
 * @property RealEstate[] $realEstates
 * @property RealEstateSubCategory[] $realEstateSubCategories
 */
class RealEstateCategory extends \yii\db\ActiveRecord implements IModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'real_estate_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
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
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealEstates()
    {
        return $this->hasMany(RealEstate::className(), ['categoryId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealEstateSubCategories()
    {
        return $this->hasMany(RealEstateSubCategory::className(), ['categoryId' => 'id']);
    }

    public function settings()
    {
        return [
            'header' => 'title'
        ];
    }
}
