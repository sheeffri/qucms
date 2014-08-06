<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var admin\models\search\ImageSection $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="image-section-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'path') ?>

    <?= $form->field($model, 'url') ?>

    <?= $form->field($model, 'width') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'cropToMax') ?>

    <?php // echo $form->field($model, 'cropToWidth') ?>

    <?php // echo $form->field($model, 'cropToHeight') ?>

    <?php // echo $form->field($model, 'quality') ?>

    <?php // echo $form->field($model, 'forRetina') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
