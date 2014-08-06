<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Contractor $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="contractor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'ownerId')->textInput() ?>

    <?= $form->field($model, 'parentContractorId')->textInput() ?>

    <?= $form->field($model, 'isVip')->textInput() ?>

    <?= $form->field($model, 'ownershipId')->textInput() ?>

    <?= $form->field($model, 'alterName')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'phoneAdd')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'skype')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'site')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
