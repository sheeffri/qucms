<?php
/**
 * Created by PhpStorm.
 * User: XPyct
 * Date: 6/22/14
 * Time: 1:06 PM
 */

namespace siasoft\fontawesome;

use yii\base\InvalidConfigException;
use yii\helpers\Html;

class IconHelper
{
    const SIZE_NORMAL = 0;
    const SIZE_LG = 1;
    const SIZE_2x = 2;
    const SIZE_3x = 3;
    const SIZE_4x = 4;
    const SIZE_5x = 5;

    const ROTATE_0 = 0;
    const ROTATE_90 = 90;
    const ROTATE_180 = 180;
    const ROTATE_270 = 270;

    const PULL_NONE = '';
    const PULL_LEFT = 'left';
    const PULL_RIGHT = 'right';

    private static $_sizes = [
        self::SIZE_NORMAL => '',
        self::SIZE_LG => ' fa-lg',
        self::SIZE_2x => ' fa-2x',
        self::SIZE_3x => ' fa-3x',
        self::SIZE_4x => ' fa-4x',
        self::SIZE_5x => ' fa-5x'
    ];

    private static $_rotates = [
        self::ROTATE_0 => '',
        self::ROTATE_90 => ' fa-rotate-90',
        self::ROTATE_180 => ' fa-rotate-180',
        self::ROTATE_270 => ' fa-rotate-270'
    ];

    //private static $_icons;

    public static function icon($icon, $options = [])
    {
        $options = array_merge([
                'tag' => 'i',
                'size' => static::SIZE_NORMAL,
                'fixedWidth' => false,
                'pull' => '',
                'border' => false,
                'spin' => false,
                'rotate' => static::ROTATE_0,
                'flipHorizontal' => false,
                'flipVertical' => false,
                'badge' => false,
                'options' => []
            ],
            $options
        );
        if ($options['tag'] !== 'i' && $options['tag'] !== 'span') {
            throw new InvalidConfigException('"tag" must be "i" or "span"');
        }
        if (!is_int($options['size']) || $options['size'] < 0 || $options['size'] > 5) {
            throw new InvalidConfigException('"size" must be int in [0..5] range');
        }
        $class = "fa fa-$icon";
        if ($options['size'] !== static::SIZE_NORMAL) {
            $class .= static::$_sizes[$options['size']];
        }
        if ($options['fixedWidth']) {
            $class .= ' fa-fw';
        }
        if ($options['pull']) {
            $class .= ' ' . $options['pull'];
        }
        if ($options['border']) {
            $class .= ' fa-border';
        }
        if ($options['spin']) {
            $class .= ' fa-spin';
        }
        if ($options['rotate'] !== static::ROTATE_0) {
            $class .= static::$_rotates[$options['rotate']];
        }
        if ($options['flipHorizontal']) {
            $class .= ' fa-flip-horizontal';
        }
        if ($options['flipVertical']) {
            $class .= ' fa-flip-vertical';
        }
        if (isset($options['options']['class'])) {
            $options['options']['class'] .= ' ' . $class;
        } else {
            $options['options']['class'] = $class;
        }

        return Html::tag($options['tag'], $options['badge'] ? '<em>' . $options['badge'] . '</em>' : '', $options['options']);
    }

    public static function init()
    {
//        $version = json_decode(file_get_contents(\Yii::getAlias('@vendor/package.json')))->version;
//        $fileName = \Yii::getAlias('@runtime/font-awesome' . str_replace('.', '-', $version) . '.php');
//        if (file_exists($fileName)) {
//            static::$_icons = require $fileName;
//        } else {
//            $parser = \Spyc::YAMLLoad('');
//        }
        FontAwesomeAsset::register(\Yii::$app->view);
    }
}

IconHelper::init();