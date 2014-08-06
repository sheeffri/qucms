<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\RealEstateTarget $model
 */

$this->title = 'Изменение: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Real Estate Targets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="real-estate-target-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'features' => $features
    ]) ?>

</div>
