<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
\admin\assets\AppAsset::register($this);
$this->registerAssetBundle(siasoft\qucms\web\AngularAsset::className(), \yii\web\View::POS_HEAD);
$this->registerJs('pageSetUp();');
$this->beginPage();
?>
<!DOCTYPE html>
<html id="extr-page" lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="robots" content="noindex, nofollow" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <header id="header">
            <div id="logo-group">
                <span id="logo"> <img src="/img/logo.png" alt="SmartAdmin"> </span>
            </div>
        <span id="extr-page-header-space"> <span class="hidden-mobile">Нужна учетная запись?</span> <a href="/site/signup"
                                                                                                               class="btn btn-danger">Создать аккаунт</a> </span>
        </header>

        <div id="main" role="main">
            <div id="content" class="container">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
                        <h1 class="txt-color-red login-header-big">АИС "Иваницкий и партнеры"</h1>


                        <div class="hero">

                            <div class="pull-left login-desc-box-l">
                                <h4 class="paragraph-header">Автоматизированная информационная система центра недвижимости.</h4>
                                <!--<h4 class="paragraph-header">Все вопросы и предложения пишите на адрес <a href="mailto:adminbank@mail.ru">adminbank@mail.ru</a></h4>-->
                                <div class="login-app-icons">
                                    <a class="btn btn-danger btn-sm" href="javascript:void(0);">Сайт агентства</a>
                                    <a class="btn btn-danger btn-sm" href="javascript:void(0);">Поиск недвижимости</a>
                                </div>
                            </div>

                            <img style="width:210px" alt="" class="pull-right display-image" src="img/demo/iphoneview.png">

                        </div>


                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                        <div class="well no-padding">
                            <?= $content ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php
$this->endPage();
