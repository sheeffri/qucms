<?php
/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 22.07.14
 * Time: 18:06
 */

namespace siasoft\qucms\widgets;


use siasoft\qucms\web\SummernoteLangAsset;
use yii\bootstrap\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

class Summernote extends Widget {
    public $model;

    public $attribute;

    public $clientOptions = [];

    public function run()
    {
        echo Html::activeTextarea($this->model, $this->attribute);
        SummernoteLangAsset::register($this->view);
        $id = Html::getInputId($this->model, $this->attribute);
        $clientOptions = Json::encode($this->clientOptions, JSON_FORCE_OBJECT);
        $this->view->registerJs("jQuery('#$id').summernote($clientOptions);");
    }
} 