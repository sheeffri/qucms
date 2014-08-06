<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\RealEstateFeatureGroup $model
 */

$this->title = 'Новая группа';
$this->params['breadcrumbs'][] = ['label' => 'Характеристики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="real-estate-feature-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
