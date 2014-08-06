<?php

namespace admin\models;

use Yii;

/**
 * This is the model class for table "Image_info".
 *
 * @property integer $id
 * @property integer $sectionId
 * @property string $title
 * @property integer $width
 * @property integer $height
 * @property integer $size
 */
class imageInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Image_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sectionId', 'width', 'height', 'size'], 'integer'],
            [['title', 'width', 'height', 'size'], 'required'],
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
            'sectionId' => 'Section ID',
            'title' => 'Title',
            'width' => 'Width',
            'height' => 'Height',
            'size' => 'Size',
        ];
    }
}
