<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var admin\models\search\Contact $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="contact-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fio') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'birthDay') ?>

    <?= $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'workPhone') ?>

    <?php // echo $form->field($model, 'mobilePhone') ?>

    <?php // echo $form->field($model, 'homePhone') ?>

    <?php // echo $form->field($model, 'skype') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'countryId') ?>

    <?php // echo $form->field($model, 'stateId') ?>

    <?php // echo $form->field($model, 'cityId') ?>

    <?php // echo $form->field($model, 'postIndex') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'lng') ?>

    <?php // echo $form->field($model, 'useEmail') ?>

    <?php // echo $form->field($model, 'usePhone') ?>

    <?php // echo $form->field($model, 'usePost') ?>

    <?php // echo $form->field($model, 'useSms') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
