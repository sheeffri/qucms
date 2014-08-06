<?php
/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 10.07.14
 * Time: 11:43
 */

namespace admin\models;


use yii\base\Model;

class Permission extends Model {
    public $type;

    public $name;

    public $description;

    public $parentName;

    public $code;

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'parentName' => 'Группа',
            'description' => 'Описание'
        ];
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 64, 'min' => 3],
            [['name'], 'unique', 'targetClass' => '\admin\models\AuthItem', 'targetAttribute' => 'name'],
            [['name'], 'match', 'pattern' => '/^[a-z][a-zA-Z0-9]*$/', 'message' => 'значение "{attribute}" должно быть в "lowerCamelCase"'],
            [['description', 'type'], 'string']
        ];
    }
} 