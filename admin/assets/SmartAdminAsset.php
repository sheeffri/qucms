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
class SmartAdminAsset extends \yii\web\AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/smartadmin-production.min.css',
        'css/smartadmin-skins.min.css',
        'css/smartadmin-rtl.min.css'];
    public $js = [
        'js/app.min.js'
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
        'admin\assets\FontAwesomeAsset',
        'admin\assets\SmartWidgetAsset'
    ];

}
