<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\RealEstateFeatureGroup $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Характеристики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="real-estate-feature-group-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>

<div class="real-estate-feature-index">

    <h1>Характеристики</h1>

    <p>
        <?= Html::a('Добавить характеристику', ['real-estate-feature/create', 'groupId' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'type',

            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'real-estate-feature'
            ],
        ],
    ]); ?>

</div>
