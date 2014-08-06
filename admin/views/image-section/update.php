<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var admin\models\ImageSection $model
 */

$this->title = 'Update Image Section: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Image Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="image-section-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
