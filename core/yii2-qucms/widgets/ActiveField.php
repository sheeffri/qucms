<?php
/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 17.07.14
 * Time: 14:27
 */

namespace siasoft\qucms\widgets;


use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class ActiveField extends \yii\bootstrap\ActiveField
{
    public $inputTemplate = "{left-addon}{inputPlace}{right-addon}";

    public function render($content = null)
    {
        if ($content === null) {
            if (!isset($this->parts['{left-addon}'])) {
                $this->parts['{left-addon}'] = [];
            }
            if (!isset($this->parts['{right-addon}'])) {
                $this->parts['{right-addon}'] = [];
            }
            $this->parts['{left-addon}'] = implode('', $this->parts['{left-addon}']);
            $this->parts['{right-addon}'] = implode('', $this->parts['{right-addon}']);
            if ($this->parts['{left-addon}'] !== '' || $this->parts['{right-addon}'] != '') {
                $this->inputTemplate = "<div class=\"input-group input\">{$this->inputTemplate}</div>";
            }
            $this->parts['{inputPlace}'] = '{input}';
            $this->inputTemplate = strtr($this->inputTemplate, $this->parts);
        }
        return parent::render($content);
    }

    public function part($name, $value)
    {
        $this->parts["{{$name}}"] = $value;
        return $this;
    }

    public function addon($position, $value)
    {
        $this->parts["{{$position}-addon}"][] = $value;
        return $this;
    }

    public function icon($position, $name)
    {
        $this->addon($position, "<span class=\"input-group-addon\"><i class=\"fa fa-$name\"></i></span>");
        return $this;
    }

    public function hint($content, $options = [])
    {
        $options['data-toggle'] = 'tooltip';
        $options['header'] = $content;
        $this->inputOptions = ArrayHelper::merge($this->inputOptions, $options);
        return $this;
    }


    public function checkbox($options = [], $enclosedByLabel = true)
    {
        Html::addCssClass($options, 'checkbox');
        Html::addCssClass($options, 'style-0');
        return parent::checkbox($options, $enclosedByLabel);
    }

    protected function renderLabelParts($label = null, $options = [])
    {
        $options = array_merge($this->labelOptions, $options);
        if ($label === null) {
            if (isset($options['label'])) {
                $label = $options['label'];
                unset($options['label']);
            } else {
                $attribute = Html::getAttributeName($this->attribute);
                $label = $this->model->getAttributeLabel($attribute);
            }
        }
        $this->parts['{beginLabel}'] = Html::beginTag('label', $options);
        $this->parts['{endLabel}'] = Html::endTag('label');
        $this->parts['{labelTitle}'] = Html::tag('span', $label);
    }
} 