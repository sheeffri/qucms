<?php
/**
 * Created by PhpStorm.
 * User: XPyct
 * Date: 6/21/14
 * Time: 8:12 AM
 */

namespace siasoft\smartadmin;

use yii\web\AssetBundle;

class SmartAsset extends AssetBundle
{
    public $sourcePath = '@vendor/siasoft/yii2-smart-admin/assets';
    public $css = [
        'smartadmin-production.min.css',
        'smartadmin-skins.min.css',
        'smartadmin-rtl.min.css'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapAsset'
    ];
} 