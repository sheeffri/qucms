<?php

namespace common\models;

use siasoft\qucms\behaviors\ImageBehavior;
use Yii;

/**
 * This is the model class for table "real_estate".
 *
 * @property integer $id
 * @property integer $targetId
 * @property integer $categoryId
 * @property integer $subCategoryId
 * @property integer $createdBy
 * @property integer $ownerId
 * @property integer $contractorId
 * @property integer $contactId
 * @property integer $roomCount
 * @property integer $floor
 * @property integer $floors
 * @property double $squareAll
 * @property double $squareLiving
 * @property double $squareKitchen
 * @property double $squareBalcony
 * @property double $squareBathroom
 * @property string $createdAt
 * @property string $updatedAt
 * @property integer $updatedBy
 * @property string $status
 * @property string $dateSale
 * @property integer $price
 * @property integer $priceHidden
 * @property integer $auction
 * @property integer $isRented
 * @property integer $isDeleted
 * @property integer $toSite
 * @property integer $forExport
 * @property integer $countryId
 * @property integer $regionId
 * @property integer $cityId
 * @property string $address
 * @property double $lat
 * @property double $lng
 * @property integer $buildMaterialId
 * @property integer $apartmentLayoutId
 * @property integer $conditionId
 * @property integer $bathroomCount
 * @property double $ceilingHeight
 * @property integer $yearBuild
 * @property string $description
 * @property string $descriptionForSite
 * @property string $descriptionNear
 * @property string $rentedWith
 * @property string $rentedTo
 *
 * @property City $city
 * @property Contact $contact
 * @property Contractor $contractor
 * @property Country $country
 * @property RealEstateCategory $category
 * @property RealEstateSubCategory $subCategory
 * @property RealEstateTarget $target
 * @property Region $region
 * @property User $createdBy0
 * @property User $owner
 * @property RealEstateObjectFeature $realEstateObjectFeature
 * @property RealEstateFeature[] $realEstateFeatures
 */
class RealEstate extends \yii\db\ActiveRecord
{
    public static $groups = [
        'Площадь',
        'Разное'
    ];

    public static $mainFeature = [
        ['squareAll', 'int', 0],
        ['squareLiving', 'int', 0],
        ['squareKitchen', 'int', 0],
        ['squareBalcony', 'int', 0],
        ['squareBathroom', 'int', 0],
        ['roomCount', 'int', 1],
        ['floor', 'int', 1],
        ['floors', 'int', 1],
        ['buildMaterialId', 'link', 1],
        ['apartmentLayoutId', 'link', 1],
        ['bathroomCount', 'int', 1],
        ['yearBuild', 'date', 1],
        ['ceilingHeight', 'int', 1]
    ];

    public function behaviors()
    {
        return [
            'images' => [
                'class' => ImageBehavior::className()
            ]
        ];
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'real_estate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['targetId', 'categoryId', 'subCategoryId', 'createdBy', 'createdAt', 'countryId', 'regionId', 'cityId', 'address'], 'required'],
            [['targetId', 'categoryId', 'subCategoryId', 'createdBy', 'ownerId', 'contractorId', 'contactId', 'roomCount', 'floor', 'floors', 'updatedBy', 'price', 'priceHidden', 'auction', 'isRented', 'isDeleted', 'toSite', 'forExport', 'countryId', 'regionId', 'cityId', 'buildMaterialId', 'apartmentLayoutId', 'conditionId', 'bathroomCount', 'yearBuild'], 'integer'],
            [['squareAll', 'squareLiving', 'squareKitchen', 'squareBalcony', 'squareBathroom', 'lat', 'lng', 'ceilingHeight'], 'number'],
            [['createdAt', 'updatedAt', 'dateSale', 'rentedWith', 'rentedTo'], 'safe'],
            [['status', 'description', 'descriptionForSite', 'descriptionNear'], 'string'],
            [['address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'targetId' => 'Тип недвижимости',
            'categoryId' => 'Категория',
            'subCategoryId' => 'Подкатегория',
            'createdBy' => 'Создатель',
            'ownerId' => 'Владелец',
            'contractorId' => 'Клиент',
            'contactId' => 'Контактное лицо',
            'roomCount' => 'Количество комнат',
            'floor' => 'Этаж',
            'floors' => 'Этажность здания',
            'squareAll' => 'Площадь общая',
            'squareLiving' => 'Площадь жилая',
            'squareKitchen' => 'Площадь кухни',
            'squareBalcony' => 'Площадь балкона',
            'squareBathroom' => 'Площадь санузла',
            'createdAt' => 'Дата создания',
            'updatedAt' => 'Дата изменения',
            'updatedBy' => 'Кем изменено',
            'status' => 'Опубликован',
            'dateSale' => 'Дата продажи',
            'price' => 'Цена',
            'priceHidden' => 'Скрыть цену',
            'auction' => 'Торг уместен',
            'isRented' => 'Сдана',
            'isDeleted' => 'Удалить',
            'toSite' => 'На сайт',
            'forExport' => 'Для выгрузки',
            'countryId' => 'Страна',
            'regionId' => 'Регион',
            'cityId' => 'Город',
            'address' => 'Адрес',
            'lat' => 'Широта',
            'lng' => 'Долгота',
            'buildMaterialId' => 'Строительный материал',
            'apartmentLayoutId' => 'Планировка',
            'conditionId' => 'Состояние',
            'bathroomCount' => 'Количество балконов',
            'ceilingHeight' => 'Высота потолков',
            'yearBuild' => 'Дата постройки',
            'description' => 'Описание',
            'descriptionForSite' => 'Описание для сайта',
            'descriptionNear' => 'Что находитс рядом',
            'rentedWith' => 'Сдана с',
            'rentedTo' => 'Сдана по',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'cityId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContact()
    {
        return $this->hasOne(Contact::className(), ['id' => 'contactId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContractor()
    {
        return $this->hasOne(Contractor::className(), ['id' => 'contractorId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'countryId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(RealEstateCategory::className(), ['id' => 'categoryId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubCategory()
    {
        return $this->hasOne(RealEstateSubCategory::className(), ['id' => 'subCategoryId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarget()
    {
        return $this->hasOne(RealEstateTarget::className(), ['id' => 'targetId']);
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
    public function getCreatedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'createdBy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(User::className(), ['id' => 'ownerId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealEstateObjectFeature()
    {
        return $this->hasOne(RealEstateObjectFeature::className(), ['realEstateId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealEstateFeatures()
    {
        return $this->hasMany(RealEstateFeature::className(), ['id' => 'realEstateFeatureId'])->viaTable('real_estate_object_feature', ['realEstateId' => 'id']);
    }

    public function getFeatures()
    {
        $features = [];
        $fieldConfig = $this->target->fields;
        foreach(RealEstate::$mainFeature as $index => $feature) {
            list($name, $type, $group) = $feature;
            if (((1 << $index) & $fieldConfig) > 0) {
                $features[RealEstate::$groups[$group]][] = ['name' => $name, 'type' => $type, 'predetermined' => true ];
            }
        }
        return $features;
    }
}
