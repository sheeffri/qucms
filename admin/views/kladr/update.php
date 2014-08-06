<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\City $model
 */

$this->title = 'Радактирование: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Адресный классификатор', 'url' => ['index']];
$this->params['breadcrumbs'] = array_merge($this->params['breadcrumbs'], $breadcrumbs);
$this->params['breadcrumbs'][] = 'Радактирование';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?=
$this->render('_form', [
    'model' => $model,
]) ?>
