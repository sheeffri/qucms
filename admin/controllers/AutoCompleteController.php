<?php

namespace admin\controllers;

use yii\db\Expression;
use yii\db\Query;
use yii\filters\VerbFilter;
use yii\helpers\Security;
use yii\helpers\VarDumper;
use yii\web\Controller;

class AutoCompleteController extends Controller
{
    public function behaviors()
    {
        return [
            'verb' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $config = \Yii::$app->request->post('config');
        $term = \Yii::$app->request->post('term');
        $condition = \Yii::$app->request->post('condition');

        $autoComplete = null;
        echo $autoComplete;
        \Yii::$app->session->open();
        $config = unserialize(Security::decrypt(base64_decode($config), \Yii::$app->session->id));
        \Yii::$app->session->close();

        $query = (new Query())
            ->select("$config[label] label")
            ->from($config['table'])
            ->where($condition)
            ->andWhere(['like', $config['label'], $term])
            ->limit(10);
        if (isset($config['value'])) {
            $query->addSelect("$config[value] id");
        }
        //if (!isset($config['value'])) {
            //$result = ArrayHelper::getColumn($result, 'label', true);
        //}
        $result = $query->all();
        \Yii::trace(VarDumper::dumpAsString($result, 10, true));
        return json_encode($result);
    }

}
