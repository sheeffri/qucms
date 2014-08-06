<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Contractor $model
 */

$this->title = 'Create Contractor';
$this->params['breadcrumbs'][] = ['label' => 'Contractors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contractor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
