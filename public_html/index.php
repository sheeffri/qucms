<?php

if (php_sapi_name() == "cli-server") {
    $fileName = filter_input(INPUT_SERVER, 'SCRIPT_FILENAME');
    if (file_exists($fileName) && $fileName != __FILE__) {
        return false;
    }
}

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../config/aliases.php');

$config = yii\helpers\ArrayHelper::merge(
                require(__DIR__ . '/../config/main.php'),
                require(__DIR__ . '/../config/main-local.php'),
                require(__DIR__ . '/../admin/config/main.php'),
                require(__DIR__ . '/../admin/config/main-local.php')
);
$application = new yii\web\Application($config);
Yii::$classMap['yii\yii\helpers\Html'] = dirname(__DIR__) . '/core/yii2-qucms/helpers/Html.php';
$application->run();
