<?php
/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 03.07.14
 * Time: 17:48
 */
return [
    "name" => "Валидатор строки",
    "class" => '\yii\validators\StringValidator',
    "parameters" => [
        "min" => [
            "name" => "Минимальная длинна",
            "type" => "int"],
        "max" => [
            "name" => "Максимальная длинна",
            "type" => "int"
        ]
    ]
];