<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var admin\models\search\Contractor $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="contractor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'alterName') ?>

    <?= $form->field($model, 'parentContractorId') ?>

    <?= $form->field($model, 'ownerId') ?>

    <?php // echo $form->field($model, 'isVip') ?>

    <?php // echo $form->field($model, 'ownershipId') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'phoneAdd') ?>

    <?php // echo $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'skype') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'site') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
