<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "real_estate_sub_category".
 *
 * @property integer $id
 * @property string $title
 * @property integer $categoryId
 *
 * @property RealEstate[] $realEstates
 * @property RealEstateCategory $category
 */
class RealEstateSubCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'real_estate_sub_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'categoryId'], 'required'],
            [['categoryId'], 'integer'],
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
            'categoryId' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealEstates()
    {
        return $this->hasMany(RealEstate::className(), ['subCategoryId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(RealEstateCategory::className(), ['id' => 'categoryId']);
    }
}
