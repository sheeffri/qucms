<?php
/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 25.07.14
 * Time: 11:24
 */

namespace common\models;


use yii\base\Model;

class Addres extends Model {
    public $countryValue;
    public $country;

    public $regionValue;
    public $region;

    public $cityValue;
    public $city;

    public function attributeLabels()
    {
        return [
            'country' => 'Страна',
            'region' => 'Регион',
            'city' => 'Город'
        ];
    }

    public function rules()
    {
        return [
            [['country', 'region', 'city'], 'required'],
            [['countryValue', 'regionValue', 'cityValue'], 'integer']
        ];
    }
} 