<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $fio
 * @property string $type
 * @property string $birthDay
 * @property integer $sex
 * @property string $workPhone
 * @property string $mobilePhone
 * @property string $homePhone
 * @property string $skype
 * @property string $email
 * @property integer $countryId
 * @property integer $stateId
 * @property integer $cityId
 * @property string $postIndex
 * @property string $address
 * @property string $lat
 * @property string $lng
 * @property integer $useEmail
 * @property integer $usePhone
 * @property integer $usePost
 * @property integer $useSms
 *
 * @property ContractorContact $contractorContact
 * @property Contractor[] $contractors
 * @property RealEstate[] $realEstates
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fio'], 'required'],
            [['type'], 'string'],
            [['birthDay'], 'safe'],
            [['sex', 'countryId', 'stateId', 'cityId', 'useEmail', 'usePhone', 'usePost', 'useSms'], 'integer'],
            [['fio'], 'string', 'max' => 255],
            [['workPhone', 'mobilePhone', 'homePhone'], 'string', 'max' => 11],
            [['skype', 'email'], 'string', 'max' => 100],
            [['postIndex'], 'string', 'max' => 10],
            [['address'], 'string', 'max' => 2555],
            [['lat', 'lng'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'type' => 'Type',
            'birthDay' => 'Birth Day',
            'sex' => 'Sex',
            'workPhone' => 'Work Phone',
            'mobilePhone' => 'Mobile Phone',
            'homePhone' => 'Home Phone',
            'skype' => 'Skype',
            'email' => 'Email',
            'countryId' => 'Country ID',
            'stateId' => 'State ID',
            'cityId' => 'City ID',
            'postIndex' => 'Post Index',
            'address' => 'Address',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'useEmail' => 'Use Email',
            'usePhone' => 'Use Phone',
            'usePost' => 'Use Post',
            'useSms' => 'Use Sms',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContractorContact()
    {
        return $this->hasOne(ContractorContact::className(), ['contactId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContractors()
    {
        return $this->hasMany(Contractor::className(), ['id' => 'contractorId'])->viaTable('contractor_contact', ['contactId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealEstates()
    {
        return $this->hasMany(RealEstate::className(), ['contactId' => 'id']);
    }
}
