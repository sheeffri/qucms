<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace admin\assets;

/**
 * Description of SmartWidgetAsset
 *
 * @author SW-PC1
 */
class SmartWidgetAsset extends \yii\web\AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/smartNotification.min.js',
        'js/jarvis.widget.min.js'
    ];
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\jui\TooltipAsset',
        'yii\jui\SortableAsset'
    ];

}
