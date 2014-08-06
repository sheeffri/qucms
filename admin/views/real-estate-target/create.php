<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\RealEstateTarget $model
 */

$this->title = 'Новый тип недвижимости';
$this->params['breadcrumbs'][] = ['label' => 'Real Estate Targets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="real-estate-target-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'features' => $features
    ]) ?>

</div>
