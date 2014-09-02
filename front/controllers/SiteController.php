<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace front\controllers;
use common\models\SignupForm;
use common\models\LoginForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * Description of SiteController
 *
 * @author SW-PC1
 */
class SiteController extends \yii\web\Controller
{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'common\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index.php');
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $this->layout = 'simple';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(\Yii::$app->request->post())) {
            $user = $model->signup();
            if ($user) {
                if (\Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        $this->layout = 'simple';
        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}
