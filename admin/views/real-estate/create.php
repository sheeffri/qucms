<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\RealEstate $model
 * @var \common\models\Addres $addressModel
 */

$this->title = 'Create Real Estate';
$this->params['breadcrumbs'][] = ['label' => 'Real Estates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="real-estate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'addressModel' => $addressModel,
        'targets' => $targets
    ]) ?>

</div>
