<?php
/**
 * Created by PhpStorm.
 * User: Tourist
 * Date: 16.08.14
 * Time: 16:44
 */

namespace siasoft\qucms\widgets;

use yii\helpers\ArrayHelper;
use yii\widgets\Menu;

class TreeView extends Menu {
    public $partTemplate = [];
    public $partMap = [];

    protected function renderItem($item)
    {
        $renderedItem = parent::renderItem($item);
        $parts = [];
        foreach ($this->partMap as $part => $field) {
            if (array_key_exists($field, $item)) {
                $parts[$part] = strtr(ArrayHelper::getValue($this->partTemplate, $part, "{$part}"), [$part => $item[$field]]);
            }
        }
        $renderedItem = strtr($renderedItem, $parts);
        return $renderedItem;
    }
} 