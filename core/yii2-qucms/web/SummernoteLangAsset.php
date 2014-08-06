<?php
namespace siasoft\qucms\web;

use yii\web\AssetBundle;

class SummernoteLangAsset extends AssetBundle {
    public $sourcePath = "@vendor/HackerWins/summernote/lang";

    public $js = [
        "summernote-ru-RU.js"
    ];

    public $depends = [
        'siasoft\qucms\web\SummernoteAsset'
    ];
}