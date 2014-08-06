<?php
namespace siasoft\qucms\web;

use yii\web\AssetBundle;

class SummernoteAsset extends AssetBundle {
    public $sourcePath = "@vendor/HackerWins/summernote/dist";

    public $js = [
        "summernote.min.js"
    ];

    public $css = [
        "summernote.css"
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'admin\assets\FontAwesomeAsset'
    ];
}