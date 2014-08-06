<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace admin\assets;

/**
 * Description of AppAsset
 *
 * @author SW-PC1
 */
class JQueryDeserializeAsset extends \yii\web\AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/jquery.deserialize.min.js'
    ];
    public $css = [];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
