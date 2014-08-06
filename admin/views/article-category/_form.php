<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\ArticleCategory $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="article-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'parentId')->dropDownList($parents, ['disabled' => $model->hasChild])->label('Родитель') ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->errorSummary($model, ['class' => 'alert alert-danger']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
