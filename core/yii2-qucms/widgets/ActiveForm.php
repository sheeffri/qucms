<?php
/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 17.07.14
 * Time: 12:34
 */

namespace siasoft\qucms\widgets;


use yii\helpers\Html;

class ActiveForm extends \yii\bootstrap\ActiveForm
{
    public function init()
    {
        Html::addCssClass($this->options, 'smart-form');
        if (!isset($this->fieldConfig['class'])) {
            $this->fieldConfig['class'] = ActiveField::className();
        }
        parent::init();
    }
} 