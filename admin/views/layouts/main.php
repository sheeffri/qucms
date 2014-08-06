<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
\admin\assets\AppAsset::register($this);
$this->registerAssetBundle(siasoft\qucms\web\AngularAsset::className(), \yii\web\View::POS_HEAD);

$this->registerJs('pageSetUp();');
$this->beginPage();
?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="fixed-header fixed-navigation fixed-ribbon fixed-page-footer">
    <?php $this->beginBody() ?>
    <?= $this->render('header'); ?>
    <?= $this->render('nav'); ?>
    <div id="main" role="main">
        <div id="ribbon">
            <?= \yii\widgets\Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
        </div>
        <div id="content">
            <?= $content ?>
        </div>
    </div>
    <?= $this->render('footer'); ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();