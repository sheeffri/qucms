<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var admin\models\ImageSection $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Image Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-section-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'path',
            'url:url',
            'width',
            'height',
            'cropToMax',
            'cropToWidth',
            'cropToHeight',
            'quality',
            'forRetina',
        ],
    ]) ?>

</div>
