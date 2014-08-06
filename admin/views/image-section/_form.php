<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var admin\models\ImageSection $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="image-section-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'path')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'cropToHeight')->textInput() ?>

    <?= $form->field($model, 'width')->textInput() ?>

    <?= $form->field($model, 'height')->textInput() ?>

    <?= $form->field($model, 'cropToMax')->textInput() ?>

    <?= $form->field($model, 'cropToWidth')->textInput() ?>

    <?= $form->field($model, 'quality')->textInput() ?>

    <?= $form->field($model, 'forRetina')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
