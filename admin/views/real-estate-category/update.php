<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\RealEstateCategory $model
 */

$this->title = 'Update Real Estate Category: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Real Estate Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="real-estate-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
