<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\RealEstateFeature $model
 */

$this->title = 'Новая характеристика';
$this->params['breadcrumbs'][] = ['label' => 'Характеристики', 'url' => ['real-estate-feature-group/index']];
$this->params['breadcrumbs'][] = ['label' => $model->group->name, 'url' => ['real-estate-feature-group/view', 'id' => $model->groupId]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="real-estate-feature-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
