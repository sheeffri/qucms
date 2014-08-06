<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Contact $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="contact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'birthDay')->textInput() ?>

    <?= $form->field($model, 'sex')->textInput() ?>

    <?= $form->field($model, 'countryId')->textInput() ?>

    <?= $form->field($model, 'stateId')->textInput() ?>

    <?= $form->field($model, 'cityId')->textInput() ?>

    <?= $form->field($model, 'useEmail')->textInput() ?>

    <?= $form->field($model, 'usePhone')->textInput() ?>

    <?= $form->field($model, 'usePost')->textInput() ?>

    <?= $form->field($model, 'useSms')->textInput() ?>

    <?= $form->field($model, 'workPhone')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'mobilePhone')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'homePhone')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'skype')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'postIndex')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => 2555]) ?>

    <?= $form->field($model, 'lat')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'lng')->textInput(['maxlength' => 25]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
