<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "qucms_layout".
 *
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $data
 */
class Layout extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qucms_layout';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'title', 'data'], 'required'],
            [['name'], 'unique'],
            [['data'], 'string'],
            [['name', 'title'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'title' => 'Заголовок',
            'description' => 'описание',
            'data' => 'Макет',
        ];
    }
}
