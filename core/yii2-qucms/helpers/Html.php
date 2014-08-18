<?php
/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 13.08.14
 * Time: 13:40
 */

namespace yii\helpers;

use yii\base\Model;

class Html extends BaseHtml
{
    private static $labelClasses = [
        'text' => 'input'
    ];

    private static $additional = [
        'checkbox' => '<i></i>',
        'radio' => '<i></i>'
    ];

    public static function input($type, $name = null, $value = null, $options = [])
    {
        $leftIcon = ArrayHelper::remove($options, 'left-icon', '');
        $rightIcon = ArrayHelper::remove($options, 'right-icon', '');
        $icons = '';
        if ($leftIcon !== '') {
            $icons = "<i class=\"icon-prepend fa fa-$leftIcon\"></i>";
        }
        if ($rightIcon !== '') {
            $icons = $icons . "<i class=\"icon-append fa fa-$rightIcon\"></i>";
        }

        $input = $icons . parent::input($type, $name, $value, $options) . ArrayHelper::getValue(self::$additional, $type, '');
        if (isset(self::$labelClasses[$type])) {
            return self::tag("label", $input, ['class' => self::$labelClasses[$type]]);
        }
        return $input;
    }

    public static function dropDownList($name, $selection = null, $items = [], $options = [])
    {
        return self::tag('label', parent::dropDownList($name, $selection, $items, $options) . '<i></i>', ['class' => 'select']);
    }


} 