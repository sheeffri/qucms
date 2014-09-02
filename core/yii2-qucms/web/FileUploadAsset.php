<?php
/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 25.08.14
 * Time: 11:27
 */

namespace siasoft\qucms\web;


use yii\web\AssetBundle;

class FileUploadAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = ['js/jquery.fileupload.js'];
} 