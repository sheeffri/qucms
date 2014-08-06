<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var admin\models\ImageSection $model
 */

$this->title = 'Create Image Section';
$this->params['breadcrumbs'][] = ['label' => 'Image Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-section-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
