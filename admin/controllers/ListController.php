<?php

namespace admin\controllers;

class ListController extends \yii\web\Controller
{
    public function actionIndex($listName)
    {
        return $this->render('index', ['listName' => $listName]);
    }

}
