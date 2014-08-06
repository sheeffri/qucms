<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\RealEstateCategory $model
 */

$this->title = 'Create Real Estate Category';
$this->params['breadcrumbs'][] = ['label' => 'Real Estate Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="real-estate-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
