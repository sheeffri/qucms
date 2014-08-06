<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var admin\models\search\RealEstate $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="real-estate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'targetId') ?>

    <?= $form->field($model, 'categoryId') ?>

    <?= $form->field($model, 'subCategoryId') ?>

    <?= $form->field($model, 'createdBy') ?>

    <?php // echo $form->field($model, 'ownerId') ?>

    <?php // echo $form->field($model, 'contractorId') ?>

    <?php // echo $form->field($model, 'contactId') ?>

    <?php // echo $form->field($model, 'roomCount') ?>

    <?php // echo $form->field($model, 'floor') ?>

    <?php // echo $form->field($model, 'floors') ?>

    <?php // echo $form->field($model, 'squareAll') ?>

    <?php // echo $form->field($model, 'squareLiving') ?>

    <?php // echo $form->field($model, 'squareKitchen') ?>

    <?php // echo $form->field($model, 'squareBalcony') ?>

    <?php // echo $form->field($model, 'squareBathroom') ?>

    <?php // echo $form->field($model, 'createdAt') ?>

    <?php // echo $form->field($model, 'updatedAt') ?>

    <?php // echo $form->field($model, 'updatedBy') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'dateSale') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'priceHidden') ?>

    <?php // echo $form->field($model, 'auction') ?>

    <?php // echo $form->field($model, 'isRented') ?>

    <?php // echo $form->field($model, 'isDeleted') ?>

    <?php // echo $form->field($model, 'toSite') ?>

    <?php // echo $form->field($model, 'forExport') ?>

    <?php // echo $form->field($model, 'countryId') ?>

    <?php // echo $form->field($model, 'regionId') ?>

    <?php // echo $form->field($model, 'cityId') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'lng') ?>

    <?php // echo $form->field($model, 'buildMaterialId') ?>

    <?php // echo $form->field($model, 'apartmentLayoutId') ?>

    <?php // echo $form->field($model, 'conditionId') ?>

    <?php // echo $form->field($model, 'bathroomCount') ?>

    <?php // echo $form->field($model, 'ceilingHeight') ?>

    <?php // echo $form->field($model, 'yearBuild') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'descriptionForSite') ?>

    <?php // echo $form->field($model, 'descriptionNear') ?>

    <?php // echo $form->field($model, 'rentedWith') ?>

    <?php // echo $form->field($model, 'rentedTo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
