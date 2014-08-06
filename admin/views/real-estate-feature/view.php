<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\RealEstateFeature $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Характеристики', 'url' => ['real-estate-feature-group/index']];
$this->params['breadcrumbs'][] = ['label' => $model->group->name, 'url' => ['real-estate-feature-group/view', 'id' => $model->groupId]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="real-estate-feature-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'type',
            'groupId',
        ],
    ]) ?>

</div>
