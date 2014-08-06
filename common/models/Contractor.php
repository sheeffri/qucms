<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contractor".
 *
 * @property integer $id
 * @property string $name
 * @property string $alterName
 * @property integer $parentContractorId
 * @property integer $ownerId
 * @property integer $isVip
 * @property integer $ownershipId
 * @property string $phone
 * @property string $phoneAdd
 * @property string $fax
 * @property string $skype
 * @property string $email
 * @property string $site
 *
 * @property ContractorAddress[] $contractorAddresses
 * @property ContractorContact $contractorContact
 * @property Contact[] $contacts
 * @property RealEstate[] $realEstates
 */
class Contractor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contractor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'ownerId'], 'required'],
            [['parentContractorId', 'ownerId', 'isVip', 'ownershipId'], 'integer'],
            [['name', 'alterName'], 'string', 'max' => 45],
            [['phone', 'phoneAdd', 'fax'], 'string', 'max' => 11],
            [['skype', 'email'], 'string', 'max' => 100],
            [['site'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'alterName' => 'Alter Name',
            'parentContractorId' => 'Parent Contractor ID',
            'ownerId' => 'Owner ID',
            'isVip' => 'Is Vip',
            'ownershipId' => 'Ownership ID',
            'phone' => 'Phone',
            'phoneAdd' => 'Phone Add',
            'fax' => 'Fax',
            'skype' => 'Skype',
            'email' => 'Email',
            'site' => 'Site',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContractorAddresses()
    {
        return $this->hasMany(ContractorAddress::className(), ['contractorId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContractorContact()
    {
        return $this->hasOne(ContractorContact::className(), ['contractorId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contact::className(), ['id' => 'contactId'])->viaTable('contractor_contact', ['contractorId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealEstates()
    {
        return $this->hasMany(RealEstate::className(), ['contractorId' => 'id']);
    }
}
