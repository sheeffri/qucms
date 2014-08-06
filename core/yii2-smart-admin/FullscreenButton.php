<?php
/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 01.07.14
 * Time: 18:29
 */

namespace siasoft\smartadmin;


use siasoft\fontawesome\IconHelper;
use yii\bootstrap\Widget;
use yii\helpers\Html;

class FullscreenButton extends Widget
{
    public $linkOptions = [];

    public $buttonClass = 'btn-header';

    public function run()
    {
        if ($this->buttonClass) {
            Html::addCssClass($this->options, $this->buttonClass);
        }
        if (!isset($this->linkOptions)) {
            $this->linkOptions['title'] = 'Full screen';
        }
        return
            Html::beginTag('div', $this->options) .
            '<span>' . Html::a(IconHelper::icon('arrows-alt', []), '#', $this->linkOptions) . '</span>' .
            Html::endTag('div');
    }
} 