<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\RealEstateFeature $model
 */

$this->title = 'Изменение: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Характеристики', 'url' => ['real-estate-feature-group/index']];
$this->params['breadcrumbs'][] = ['label' => $model->group->name, ['real-estate-feature-group/view', 'id' => $model->groupId]];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="real-estate-feature-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
