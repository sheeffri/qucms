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

class ActiveField extends \yii\widgets\ActiveField
{
    public $options = ['tag' => 'section'];

    public function hint($content, $options = [])
    {
        $options['data-toggle'] = 'tooltip';
        $options['header'] = $content;
        $this->inputOptions = ArrayHelper::merge($this->inputOptions, $options);
        return $this;
    }

    public function placeholder($hideLabel = true)
    {
        if ($hideLabel) {
            $this->label(false);
        }
        $this->inputOptions['placeholder'] = $this->model->getAttributeLabel($this->attribute);
        return $this;
    }
} 