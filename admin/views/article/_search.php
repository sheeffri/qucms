<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var admin\models\search\Article $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="article-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'categoryId') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'introText') ?>

    <?= $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'tags') ?>

    <?php // echo $form->field($model, 'authorId') ?>

    <?php // echo $form->field($model, 'createdAt') ?>

    <?php // echo $form->field($model, 'updaterAt') ?>

    <?php // echo $form->field($model, 'createdBy') ?>

    <?php // echo $form->field($model, 'updatedBy') ?>

    <?php // echo $form->field($model, 'isPublished') ?>

    <?php // echo $form->field($model, 'publishedAt') ?>

    <?php // echo $form->field($model, 'publishedBy') ?>

    <?php // echo $form->field($model, 'isDeleted') ?>

    <?php // echo $form->field($model, 'deletedAt') ?>

    <?php // echo $form->field($model, 'deletedBy') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
