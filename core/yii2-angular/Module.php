<?php
/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 18.07.14
 * Time: 16:11
 */

namespace siasoft\angular;


use yii\base\Object;

class Module extends Object {

    public $name;

    public function CreateController()
    {
        return new Controller();
    }
} 