<?php
/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 25.08.14
 * Time: 14:13
 */

namespace admin\controllers;

use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Session;

class ImageController extends Controller
{
    public function actionUpload()
    {
        $parameterName = \Yii::$app->request->post('parameterName');
        require \Yii::getAlias('@siasoft/qucms/web/UploadHandler.php');
        $uploader = new \UploadHandler([
            'param_name' => $parameterName,
            'upload_dir' => \Yii::getAlias('@webroot/img/upload/'),
            'upload_url' => '/img/upload/',
            'image_versions' => []
        ], false);
        $result = $uploader->post(false);
        $result = $result[$parameterName][0];
        $session = new Session();
        $session->open();
        $key = \Yii::$app->request->post('key');
        $value = $session->get($key, []);
        $value[] = $result;
        $session->set($key, $value);
        $session->close();
        return json_encode($result);
    }

    public function actionRemove($key, $file)
    {
    }
} 