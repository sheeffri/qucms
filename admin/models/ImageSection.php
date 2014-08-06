<?php

namespace admin\models;

use Yii;

/**
 * This is the model class for table "image_section".
 *
 * @property integer $id
 * @property string $name
 * @property string $path
 * @property string $url
 * @property integer $width
 * @property integer $height
 * @property integer $cropToMax
 * @property integer $cropToWidth
 * @property integer $cropToHeight
 * @property integer $quality
 * @property integer $forRetina
 *
 * @property ImageInfo $imageInfo
 */
class ImageSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image_section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'path', 'url', 'cropToHeight'], 'required'],
            [['width', 'height', 'cropToMax', 'cropToWidth', 'cropToHeight', 'quality', 'forRetina'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['path', 'url'], 'string', 'max' => 255]
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
            'path' => 'Path',
            'url' => 'Url',
            'width' => 'Width',
            'height' => 'Height',
            'cropToMax' => 'Crop To Max',
            'cropToWidth' => 'Crop To Width',
            'cropToHeight' => 'Crop To Height',
            'quality' => 'Quality',
            'forRetina' => 'For Retina',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfo()
    {
        return $this->hasOne(ImageInfo::className(), ['sectionId' => 'id']);
    }
}
