<?php
/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 08.07.14
 * Time: 11:40
 */

namespace siasoft\qucms\web;


use yii\web\AssetBundle;

class AngularAsset extends AssetBundle {
    public $sourcePath = "@vendor/components/angular.js";

    public $js = [
        "angular.min.js"
    ];

    public $css = [
        "angular-csp.css"
    ];
} 