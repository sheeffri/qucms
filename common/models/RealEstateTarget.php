<?php

namespace common\models;

use Yii;
use yii\db\BaseActiveRecord;
use yii\db\Query;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "real_estate_target".
 *
 * @property integer $id
 * @property string $title
 * @property integer $fields
 * @property integer $requiredFields
 *
 * @property RealEstate[] $realEstates
 */
class RealEstateTarget extends \yii\db\ActiveRecord
{
    private $features = null;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'real_estate_target';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['fields', 'requiredFields'], 'integer'],
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
            'fields' => 'Fields',
            'requiredFields' => 'Required Fields',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealEstates()
    {
        return $this->hasMany(RealEstate::className(), ['targetId' => 'id']);
    }

    public function fieldsFromArray($features)
    {
        $this->fields = 0;
        $this->requiredFields = 0;
        $index = 0;
        $array = array_slice($features, 0, count(RealEstate::$mainFeature));
        $this->features = array_slice($features, count(RealEstate::$mainFeature), null, true);

        foreach ($array as $item) {
            $value = (1 << $index);
            if ($item['used']) {
                $this->fields = $this->fields | $value;
            }
            if ($item['required']) {
                $this->requiredFields = $this->requiredFields | $value;
            }
            $index++;
        }
    }

    public function afterSave($insert)
    {
        parent::afterSave($insert);
        if (!$insert) {
            Yii::$app->db->createCommand()->delete('real_estate_target_feature', ['real_estate_target' => $this->id])->execute();
        }
        if ($this->features === null) {
            return;
        }
        $rows = [];
        foreach ($this->features as $id => $row) {
            $rows[] = [
                $this->id,
                $id,
                isset($row['required']) ? $row['required'] : false
            ];
        }
        Yii::$app->db->createCommand()->batchInsert('real_estate_target_feature', [
            'real_estate_target',
            'real_estate_feature',
            'required'], $rows)->execute();
    }


}
